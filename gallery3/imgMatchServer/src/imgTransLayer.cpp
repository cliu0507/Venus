/******************************************************************************
imgMatch ::  high-performance image matching server
---------------------------------------
begin                : Mon Sep 29 2014
email                : wtfm2000@gmail.com

Copyright (C) 2014-2014 Dongfeng Wang
 ******************************************************************************/

/* C Include */
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <errno.h>
#include <string.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <netdb.h>
#include <arpa/inet.h>
#include <sys/wait.h>
#include <signal.h>
#include <thread>

/* STL Includes */
#include <fstream>
#include <iostream>
#include <mutex>
#include <vector>

/* imgMatch include */
#include "imgMatch.h"
#include "imgTransLayer.h"

/* global variable */
extern ImgGlobal imgGlobal;
extern imgMatchAction_list imgAction_list;
extern std::mutex action_list_mutex;
extern std::mutex mem_data_mutex;
extern std::condition_variable mem_data_cv;
extern int mem_ref_count;

extern distMapQueue queryImgID(const int dbId, long int id,int numres,int sketch, bool colorOnly);
extern distMapQueue queryImgPath(const int dbId, char* path,int numres,int sketch, bool colorOnly);
extern distMapQueue queryImgPathCloud(const int dbId, char* path,int numres,int sketch, bool colorOnly, int bizId);

/* forward declaration */
#ifdef IMGMATCH_BUSINESS
static void transAddImageBiz(char *recvStr);
#else
static void transAddImage(char *recvStr);
#endif
static void transRemoveImage(char *recvStr);
static void transQueryById(char *recvStr, int sock_fd);
static void transQueryByPath(char *recvStr, int sock_fd);
static void transQueryByPathCloud(char *recvStr, int sock_fd);
static int normalizeResult(double score);

/* Start the server to listen the request and act correspondingly.
   Right now we use network socket. May have unix socket as an option in the future. */
bool startServer()
{
    int sockfd;     /* socket for listening */
    int new_fd;     /* socket for new connection */
    struct addrinfo hints;
    struct addrinfo *servinfo, *p;
    struct sockaddr_storage their_addr;     /* connector's address information */
    socklen_t sin_size;
    int yes = 1;
    int rv;
    char portBuffer[MAX_PORT_LEN];

    memset(portBuffer, 0, MAX_PORT_LEN);
    memset(&hints, 0, sizeof(hints));
    hints.ai_family = AF_UNSPEC;
    hints.ai_socktype = SOCK_STREAM;
    hints.ai_flags = AI_PASSIVE;    /* use the host's IP address */

    sprintf(portBuffer, "%d", imgGlobal.port);

    if((rv = getaddrinfo(NULL, portBuffer, &hints, &servinfo)) != 0) {
        fprintf(stderr, "getaddrinfo: %s\n", gai_strerror(rv));
        return false;
    }

    // loop through all the results and bind to the first we can
    for(p = servinfo; p != NULL; p = p->ai_next) {
        if ((sockfd = socket(p->ai_family, p->ai_socktype, p->ai_protocol)) == -1) {
            perror("server: socket");
            continue;
        }

        if (setsockopt(sockfd, SOL_SOCKET, SO_REUSEADDR, &yes, sizeof(int)) == -1) {
            perror("server: setsockopt");
            return false;
        }

        if (bind(sockfd, p->ai_addr, p->ai_addrlen) == -1) {
            close(sockfd);
            perror("server: bind");
            continue;
        }

        break;
    }

    if(p == NULL)  {
        fprintf(stderr, "server: failed to bind\n");
        return false;
    }

    freeaddrinfo(servinfo);     /* all done with this structure */

    if(listen(sockfd, imgGlobal.backlog) == -1) {
        perror("server: listen");
        return false;
    }

    printf("Server started, waiting for connections...!\n");
	imgGlobal.logHandle << logTime() << "Server started, waiting for connections: " << portBuffer << std::endl;
	imgGlobal.logHandle.flush();

    while(1) {  /* main accept() loop */
        sin_size = sizeof(their_addr);
        new_fd = accept(sockfd, (struct sockaddr *)&their_addr, &sin_size);
        if (new_fd == -1) {
            perror("server: accept");
            continue;
        }

        /* spawn thread to handle the request, no need to join. */
        std::thread handleThread(handlerThread, new_fd);
        handleThread.detach();
    }

    return true;
}

void handlerThread(int new_fd)
{
    int numbytes;
    char buf[MAX_BUF_SIZE];
    char *strHead, *strFind, *strEnd;

    if ((numbytes = recv(new_fd, buf, MAX_BUF_SIZE - 1, 0)) == -1) {
        perror("recv");
        return;
    }

    buf[numbytes] = '\0';

    strHead = buf;
    strFind = strstr(buf, IMGMATCH_COMMAND_MARKER);
    if(!strFind)
    {
		imgGlobal.logHandle << logTime() << "Invalid command received: " << buf << std::endl;
		imgGlobal.logHandle.flush();
        printf("[dfw debug]: invalid command received %s\n", buf);
    }
    else
    {
        strEnd = strFind + 1;
        *strFind = '\0';

        if(strcmp(strHead, IMGMATCH_COMMAND_QUERYID) == 0)
            transQueryById(strEnd, new_fd);
        else if(strcmp(strHead, IMGMATCH_COMMAND_QUERYPATH) == 0)
            transQueryByPath(strEnd, new_fd);
        else if(strcmp(strHead, IMGMATCH_COMMAND_REMOVE) == 0)
            transRemoveImage(strEnd);
#ifdef IMGMATCH_BUSINESS
        else if(strcmp(strHead, IMGMATCH_COMMAND_ADDBIZ) == 0)
            transAddImageBiz(strEnd);
        else if(strcmp(strHead, IMGMATCH_COMMAND_QUERYPATHC) == 0)
            transQueryByPathCloud(strEnd, new_fd);
#else
        else if(strcmp(strHead, IMGMATCH_COMMAND_ADD) == 0)
            transAddImage(strEnd);
#endif
        else
            printf("[dfw debug]: invalid command %s:%s\n", strHead, strEnd);
    }

    close(new_fd);
}

/* [dfw todo]: add log and more robust checking in all the following functions */
static void transQueryById(char *recvStr, int sock_fd)
{
    char *strCategoryId, *strImgId, *strNumber, *strFind;
    int categoryId, numberQuery;
	long int imgId;

    strCategoryId = recvStr;

    strFind = strstr(strCategoryId, IMGMATCH_COMMAND_MARKER);

    if(!strFind)
    {
        printf("[dfw debug]: invaild queryId command %s\n", recvStr);

        return;
    }

    strImgId = strFind + 1;
    *strFind = '\0';
    categoryId = atoi(strCategoryId);

    strFind = strstr(strImgId, IMGMATCH_COMMAND_MARKER);

    if(!strFind)
    {
        printf("[dfw debug]: invaild queryId command %s:%s\n", strCategoryId, strImgId);

        return;
    }

    strNumber = strFind + 1;
    *strFind = '\0';
    imgId = atol(strImgId);

    numberQuery = atoi(strNumber);

    printf("[dfw debug]: received queryId command category = %d img = %ld number = %d\n", categoryId, imgId, numberQuery);

	mem_data_mutex.lock();
	++mem_ref_count;
	mem_data_mutex.unlock();

	/* query memory data and send back to the user */
	distMapQueue dist_map_queue = queryImgID(categoryId, imgId, numberQuery, 0, false);

	DistItem curResTmp;

	std::string strResult;

	while (dist_map_queue.size()) {
		curResTmp = dist_map_queue.top();
		dist_map_queue.pop();
		if (curResTmp.score < 99999) {
			strResult = strResult + std::to_string(curResTmp.id) + IMGMATCH_COMMAND_MARKER + std::to_string(normalizeResult(curResTmp.score)) + IMGMATCH_BLOCK_MARKER;
		}
	}

	printf("[dfw debug]: query id result = %s\n", strResult.c_str());
    if (send(sock_fd, strResult.c_str(), strResult.size(), 0) == -1) {
        perror("send queryId result");
    }

	mem_data_mutex.lock();
	--mem_ref_count;
	mem_data_mutex.unlock();

	mem_data_cv.notify_one();
}

static void transQueryByPath(char *recvStr, int sock_fd)
{
    char *strCategoryId, *strNumber, *strImgPath, *strFind;
    int categoryId, numberQuery;

    strCategoryId = recvStr;

    strFind = strstr(strCategoryId, IMGMATCH_COMMAND_MARKER);

    if(!strFind)
    {
        printf("[dfw debug]: invaild queryPath command %s\n", recvStr);

        return;
    }

    strNumber = strFind + 1;
    *strFind = '\0';
    categoryId = atoi(strCategoryId);

    strFind = strstr(strNumber, IMGMATCH_COMMAND_MARKER);

    if(!strFind)
    {
        printf("[dfw debug]: invaild queryPath command %s:%s\n", strCategoryId, strNumber);

        return;
    }

    strImgPath = strFind + 1;
    *strFind = '\0';
    numberQuery = atoi(strNumber);

    printf("[dfw debug]: received queryPath command category = %d number = %d path = %s\n", categoryId, numberQuery, strImgPath);

	mem_data_mutex.lock();
	++mem_ref_count;
	mem_data_mutex.unlock();

	/* query memory data and send back to the user */
	distMapQueue dist_map_queue = queryImgPath(categoryId, strImgPath, numberQuery, 0, false);

	DistItem curResTmp;

	std::string strResult;

	while (dist_map_queue.size()) {
		curResTmp = dist_map_queue.top();
		dist_map_queue.pop();
		if (curResTmp.score < 99999) {
			strResult = strResult + std::to_string(curResTmp.id) + IMGMATCH_COMMAND_MARKER + std::to_string(normalizeResult(curResTmp.score)) + IMGMATCH_BLOCK_MARKER;
		}
	}

	printf("[dfw debug]: query path result = %s\n", strResult.c_str());
    if (send(sock_fd, strResult.c_str(), strResult.size(), 0) == -1) {
        perror("send queryPath result");
    }

	mem_data_mutex.lock();
	--mem_ref_count;
	mem_data_mutex.unlock();

	mem_data_cv.notify_one();
}

static void transQueryByPathCloud(char *recvStr, int sock_fd)
{
    char *strCategoryId, *strBizId, *strNumber, *strImgPath, *strFind;
    int categoryId, bizId, numberQuery;

    strCategoryId = recvStr;

    strFind = strstr(strCategoryId, IMGMATCH_COMMAND_MARKER);

    if(!strFind)
    {
        printf("[dfw debug]: invaild queryPath command %s\n", recvStr);

        return;
    }

    strBizId = strFind + 1;
    *strFind = '\0';
    categoryId = atoi(strCategoryId);

    strFind = strstr(strBizId, IMGMATCH_COMMAND_MARKER);

    if(!strFind)
    {
        printf("[dfw debug]: invaild queryPath command %s:%s\n", strCategoryId, strBizId);

        return;
    }

    strNumber = strFind + 1;
    *strFind = '\0';
    bizId = atoi(strBizId);

    strFind = strstr(strNumber, IMGMATCH_COMMAND_MARKER);

    if(!strFind)
    {
        printf("[dfw debug]: invaild queryPath command %s:%s:%s\n", strCategoryId, strBizId, strNumber);

        return;
    }

    strImgPath = strFind + 1;
    *strFind = '\0';
    numberQuery = atoi(strNumber);

    printf("[dfw debug]: received queryPathCloud command category = %d bizId = %d number = %d path = %s\n", categoryId, bizId, numberQuery, strImgPath);

	mem_data_mutex.lock();
	++mem_ref_count;
	mem_data_mutex.unlock();

	/* query memory data and send back to the user */
	distMapQueue dist_map_queue = queryImgPathCloud(categoryId, strImgPath, numberQuery, 0, false, bizId);

	DistItem curResTmp;

	std::string strResult;

	while (dist_map_queue.size()) {
		curResTmp = dist_map_queue.top();
		dist_map_queue.pop();
		if (curResTmp.score < 99999) {
			strResult = strResult + std::to_string(curResTmp.id) + IMGMATCH_COMMAND_MARKER + std::to_string(normalizeResult(curResTmp.score)) + IMGMATCH_BLOCK_MARKER;
		}
	}

	printf("[dfw debug]: query path cloud result = %s\n", strResult.c_str());
    if (send(sock_fd, strResult.c_str(), strResult.size(), 0) == -1) {
        perror("send queryPathCloud result");
    }

	mem_data_mutex.lock();
	--mem_ref_count;
	mem_data_mutex.unlock();

	mem_data_cv.notify_one();
}

static void transRemoveImage(char *recvStr)
{
    char *strCategoryId, *strAction, *strFind;
    int categoryId;

    strCategoryId = recvStr;

    strFind = strstr(strCategoryId, IMGMATCH_COMMAND_MARKER);

    if(!strFind)
    {
        printf("[dfw debug]: invaild remove command %s\n", recvStr);

        return;
    }

    strAction = strFind + 1;
    *strFind = '\0';

    categoryId = atoi(strCategoryId);

    printf("[dfw debug]: received remove command category = %d actionString = %s\n", categoryId, strAction);

    /* add to list */
	std::string addString(strAction);
    action_list_mutex.lock();
#ifdef IMGMATCH_BUSINESS
    imgAction_list.push_back(new imgMatchAction(RemoveImage, categoryId, -1, addString));
#else
    imgAction_list.push_back(new imgMatchAction(RemoveImage, categoryId, addString));
#endif
    action_list_mutex.unlock();
}

#ifdef IMGMATCH_BUSINESS
static void transAddImageBiz(char *recvStr)
{
    char *strCategoryId, *strBizId, *strAction, *strFind;
    int categoryId, bizId;

    strCategoryId = recvStr;

    strFind = strstr(strCategoryId, IMGMATCH_COMMAND_MARKER);

    if(!strFind)
    {
        printf("[dfw debug]: invaild addBiz command %s\n", recvStr);

        return;
    }

    strBizId = strFind + 1;
    *strFind = '\0';
    categoryId = atoi(strCategoryId);
	
    strFind = strstr(strBizId, IMGMATCH_COMMAND_MARKER);

    if(!strFind)
    {
        printf("[dfw debug]: invaild addBiz command %s:%s\n", strCategoryId, strBizId);

        return;
    }

    strAction = strFind + 1;
    *strFind = '\0';
    bizId = atoi(strBizId);

    printf("[dfw debug]: received addBiz command category = %d bizId = %d actionString = %s\n", categoryId, bizId, strAction);

    /* add to list */
    std::string addString(strAction);
    action_list_mutex.lock();
    imgAction_list.push_back(new imgMatchAction(AddImageBiz, categoryId, bizId, addString));
    action_list_mutex.unlock();
}
#else
static void transAddImage(char *recvStr)
{
    char *strCategoryId, *strAction, *strFind;
    int categoryId;

    strCategoryId = recvStr;

    strFind = strstr(strCategoryId, IMGMATCH_COMMAND_MARKER);

    if(!strFind)
    {
        printf("[dfw debug]: invaild add command %s\n", recvStr);

        return;
    }

    strAction = strFind + 1;
    *strFind = '\0';
    categoryId = atoi(strCategoryId);

    printf("[dfw debug]: received add command category = %d actionString = %s\n", categoryId, strAction);

    /* add to list */
    std::string addString(strAction);
    action_list_mutex.lock();
    imgAction_list.push_back(new imgMatchAction(AddImage, categoryId, addString));
    action_list_mutex.unlock();
}
#endif

static int normalizeResult(double score)
{
	/* [dfw todo]: is this normalization factor still valid? (coming from the imgSeek comment) */
	int intResult = (-100.0 * score) / 38.70;

    if(intResult < 0)
		intResult = 0;

    if(intResult > 100)
		intResult = 100;

	return intResult;
}

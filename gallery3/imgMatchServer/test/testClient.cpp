/*
** client.c -- a stream socket client test program
*/

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <errno.h>
#include <string>
#include <string.h>
#include <netdb.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <sys/socket.h>
#include <arpa/inet.h>
#include <iostream>
#include <thread>

#define TEST_PIC_LOC			"/home/wtfm2000/share/svn-code/trunk/gallery3/imgMatchServer/picture/"
#define ADD_THREAD_NUM			10
#define ADD_EXTRATHREAD_NUM		10
#define DEL_THREAD_NUM			5
#define QUERYID_THREAD_NUM		10
#define QUERYPATH_THREAD_NUM	10

using namespace std;

void sendCommand(struct addrinfo *servinfo, const char *command, bool isQuery)
{
    int sockfd;
    struct addrinfo *p;

    // loop through all the results and connect to the first we can
    for(p = servinfo; p != NULL; p = p->ai_next) {
        if ((sockfd = socket(p->ai_family, p->ai_socktype, p->ai_protocol)) == -1) {
            perror("client: socket");
            continue;
        }

        if (connect(sockfd, p->ai_addr, p->ai_addrlen) == -1) {
            close(sockfd);
            perror("client: connect");
            continue;
        }

        break;
    }

    if (p == NULL) {
        fprintf(stderr, "client: failed to connect\n");
        return;
    }

    printf("client: connected! sending command %s\n", command);

    if (send(sockfd, command, strlen(command), 0) == -1) {
        perror("send command addImage");
    }

	if(isQuery)
	{
		const int BUFFER_SIZE = 10000;
		char buf[BUFFER_SIZE];
		int numbytes;

	    if ((numbytes = recv(sockfd, buf, BUFFER_SIZE - 1, 0)) == -1) {
		    perror("recv query result");
			return;
		}

		buf[numbytes] = '\0';

		printf("Query result = %s\n", buf);
	}

    close(sockfd);
}

int main(int argc, char *argv[])
{
    struct addrinfo hints, *servinfo;
    int rv;
	string pic_loc;
	int test_type;
	bool test_add = false;
	bool test_del = false;
	bool test_queryId = false;
	bool test_queryPath = false;

    /* command format: add image     - "add:category_id:image_id:image_path"
     *                 remove image  - "del:category_id:image_id"
     *                 query by id   - "query_id:category_id:image_id:number"
     *                 query by path - "query_path:category_id:number:image_path"
     */

	cout << "Please input test image location:" << endl;
	cin >> pic_loc;

	cout << "Please choose what you wanna do:" << endl
		 << "1 - add images" << endl
		 << "2 - delete images" << endl
		 << "3 - query by ID" << endl
		 << "4 - query by path" << endl
		 << "5 - all tests" << endl;
	cin >> test_type;

	switch(test_type)
	{
		case 1:
			test_add = true;
			break;
		case 2:
			test_del = true;
			break;
		case 3:
			test_queryId = true;
			break;
		case 4:
			test_queryPath = true;
			break;
		case 5:
			test_add = true;
			test_del = true;
			test_queryId = true;
			test_queryPath = true;
			break;
		default:
			cout << "Invalid input!" << endl;
			exit(0);
	}

    string command_addImages[ADD_THREAD_NUM];
	for (int j = 0; j < ADD_THREAD_NUM; j++) {
		command_addImages[j] = "add:1:";
		char image_url[1024];
		for (int i = 100; i < 110; i++) {
			sprintf(image_url, "%d:%s%d.jpg;", j*10 + i + 1, pic_loc.c_str(), j * 10 + i + 1);
			
			command_addImages[j] += image_url;
		}
	}

    string command_addExtraImages[ADD_EXTRATHREAD_NUM];
	for (int j = 0; j < ADD_EXTRATHREAD_NUM; j++) {
		command_addExtraImages[j] = "add:1:";
		char image_url[1024];
		for (int i = 0; i < 10; i++) {
			sprintf(image_url, "%d:%s%d.jpg;", j*10 + i + 1, pic_loc.c_str(), j * 10 + i + 1);
			
			command_addExtraImages[j] += image_url;
		}
	}

	string command_removeImages[DEL_THREAD_NUM];
	for (int j = 0; j  < DEL_THREAD_NUM; j++) {
	     command_removeImages[j] = "del:1:";
         char image_url[1024];
	     for (int i = 0; i < 10; i++) {
	             sprintf(image_url, "%d;", j*10 + i + 101);
	             command_removeImages[j] += image_url;
	     }
	}

    string command_queryById[QUERYID_THREAD_NUM];
	for (int j = 0; j < QUERYID_THREAD_NUM; j++) {
		command_queryById[j] = "query_id:1:";
		char image_url[1024];
		sprintf(image_url, "%d:200", 190 + j);
			
		command_queryById[j] += image_url;
	}

    string command_queryByPath[QUERYPATH_THREAD_NUM];
	for (int j = 0; j < QUERYPATH_THREAD_NUM; j++) {
		command_queryByPath[j] = "query_path:1:200:";
		char image_url[1024];
		sprintf(image_url, "%s%d.jpg", pic_loc.c_str(), 180 + j);
			
		command_queryByPath[j] += image_url;
	}

    if (argc != 3) {
        fprintf(stderr,"usage: hostname port\n");
        exit(1);
    }

    memset(&hints, 0, sizeof(hints));
    hints.ai_family = AF_UNSPEC;
    hints.ai_socktype = SOCK_STREAM;

    if ((rv = getaddrinfo(argv[1], argv[2], &hints, &servinfo)) != 0) {
        fprintf(stderr, "getaddrinfo: %s\n", gai_strerror(rv));
        exit(1);
    }

	std::thread addThreads[ADD_THREAD_NUM];
	std::thread addExtraThreads[ADD_EXTRATHREAD_NUM];
	if(test_add)
	{
		for (int i = 0; i < ADD_THREAD_NUM; i++) {
			std::cout << command_addImages[i].c_str() << std::endl;
			addThreads[i] = std::thread(sendCommand, servinfo, command_addImages[i].c_str(), false);
		}

		for (int i = 0; i < ADD_THREAD_NUM; i++) {
			addThreads[i].join();
		}

		for (int i = 0; i < ADD_EXTRATHREAD_NUM; i++) {
			std::cout << command_addExtraImages[i].c_str() << std::endl;
			addExtraThreads[i] = std::thread(sendCommand, servinfo, command_addExtraImages[i].c_str(), false);
		}
	}
	
	std::thread delThreads[DEL_THREAD_NUM];
	if(test_del)
	{
		for (int i = 0; i < DEL_THREAD_NUM; i++) {
			std::cout << command_removeImages[i].c_str() << std::endl;
			delThreads[i] = std::thread(sendCommand, servinfo, command_removeImages[i].c_str(), false);
		}
	}

	std::thread queryIdThreads[QUERYID_THREAD_NUM];
	if(test_queryId)
	{
		for (int i = 0; i < QUERYID_THREAD_NUM; i++) {
			std::cout << command_queryById[i].c_str() << std::endl;
			queryIdThreads[i] = std::thread(sendCommand, servinfo, command_queryById[i].c_str(), true);
		}
	}
	
	std::thread queryPathThreads[QUERYPATH_THREAD_NUM];
	if(test_queryPath)
	{
		for (int i = 0; i < QUERYPATH_THREAD_NUM; i++) {
			std::cout << command_queryByPath[i].c_str() << std::endl;
			queryPathThreads[i] = std::thread(sendCommand, servinfo, command_queryByPath[i].c_str(), true);
		}
	}

	if(test_add)
		for (int i = 0; i < ADD_EXTRATHREAD_NUM; i++) {
			 addExtraThreads[i].join();
		}

	if(test_del)
		for (int i = 0; i < DEL_THREAD_NUM; i++) {
			delThreads[i].join();
		}

	if(test_queryId)
		for (int i = 0; i < QUERYID_THREAD_NUM; i++) {
			 queryIdThreads[i].join();
		}
	
	if(test_queryPath)
		for (int i = 0; i < QUERYPATH_THREAD_NUM; i++) {
			 queryPathThreads[i].join();
		}

    freeaddrinfo(servinfo); // all done with this structure

    exit(0);
}

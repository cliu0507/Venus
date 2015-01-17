/******************************************************************************
imgMatch ::  high-performance image matching server
---------------------------------------
begin                : Mon Sep 29 2014
email                : wtfm2000@gmail.com

Copyright (C) 2014-2014 Dongfeng Wang
 ******************************************************************************/

/* C Includes */
#include <ctime>
#include <math.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include <vector>
#include <algorithm>
#include <cmath>
#include <limits>
#include <sstream>

/* STL Includes */
#include <fstream>
#include <iostream>
#include <thread>
#include <mutex>
#include <condition_variable>

using namespace std;

/* imgMatch include */
#include "imgMatch.h"
#include "imgMemLayer.h"
#include "imgTransLayer.h"

/* global variable */
ImgGlobal imgGlobal;
imgMatchAction_list imgAction_list;
std::mutex action_list_mutex;

std::mutex mem_data_mutex;
condition_variable mem_data_cv;
int mem_ref_count = 0;

std::clock_t c_start;	/* [dfw todo]: temporary solution, used for flushing memory data to disk file */
bool b_changed;			/* [dfw todo]: temporary solution, used for flushing memory data to disk file */
#define TIME_FOR_FLUSH 300	/* [dfw todo]: 5 min */

#define COMMAND_LINE_HELP	"-h"

/* forward declaration */
static bool initEnv(char *config_file);
static void printHelp();

/* main function */
int main(int argc, char **argv)
{
	if(argc == 2)
	{
		if(strcmp(argv[1], COMMAND_LINE_HELP) == 0)
		{
			printHelp();

			return 0;
		}
		else
		{
			cerr << "Error passing arguments, please try -h option for its detailed use, exit!" << endl;

			return 1;
		}
	}

	if(argc != 4)
	{
		cerr << "Error passing arguments, exit!" << endl;

		return 1;
	}

	/* command format: imgMatch.out config_file db_file log_file */
	imgGlobal.dbFileName = argv[2];

	imgGlobal.logHandle.open(argv[3], ios::app);
    if (!imgGlobal.logHandle.is_open()) {
        cerr << "ERROR: error opening log file for write. Log file = " << argv[3] << endl;
        return 2;
    }

    /* config initialization */
    if(!initEnv(argv[1]))
    {
        cerr << "Error initializing imgMatch configuration, exit!" << endl;

		imgGlobal.logHandle.close();

        return 3;
    }

    /* load from db */
    if(!loadFromDb())
    {
        cerr << "Error loading from database, exit!" << endl;

        return 4;
    }

    /* spawn maintenance thread, no need to join. */
    std::thread maintainThread(maintenanceThread);
    maintainThread.detach();

    /* start server for listening request and acting correspondingly */
    if(!startServer())
    {
        cerr << "Error starting the server, exit!" << endl;

        return 5;
    }

    return 0;
}

/* global function */
void logTime()
{
	time_t rawtime;
	struct tm *timeinfo;
	char buffer[100];

	time (&rawtime);
	timeinfo = localtime (&rawtime);

	strftime(buffer, 100, "%c:", timeinfo);

	imgGlobal.logHandle << buffer << endl;
}

/* [dfw todo]: in the future, this maintenance thread should be a pipeline structure,
			   i.e., first pipe is this action list. This thread get one element from
			   the action list and process it (analyze the picture and write to the
			   database). Then, write to another pipe. There will be another thread who
			   monitors this new pipe and updates the memory cache accordingly.
*/
void maintenanceThread()
{
    /* used for adding or removing records, cannot be static since static is not thread safe. */
    /* [dfw debug]: trace output */
    cout << "In maintenance thread!" << endl;

    while(true)
    {
		/* [dfw todo]: temporary solution, used to flush memory data to disk file */
		//flushToDisk();

        action_list_mutex.lock();
        if(!imgAction_list.empty())
        {
            imgMatchAction *firstAction = imgAction_list.front();
            imgAction_list.pop_front();

			/* unlock the mutex to make others be able to write to the action list */
			action_list_mutex.unlock();

			/* add image or remove image */
			doingAction(firstAction);
        }
		else
		{
			action_list_mutex.unlock();
		}
    }
}

void flushToDisk()
{
	if(b_changed)
	{
		std::clock_t c_now = std::clock();

		if(((c_now - c_start) / CLOCKS_PER_SEC) > TIME_FOR_FLUSH)
		{
			savealldbs(imgGlobal.dbFileName);

			b_changed = false;
			c_start = std::clock();
		}
	}
}

void doingAction(imgMatchAction *actionItem)
{
#ifdef IMGMATCH_BUSINESS
	cout << "[dfw debug] list element: type = " << actionItem->actionType << " category = "
	<< actionItem->categoryId << " bizId = " << actionItem->bizId << " action = "
	<< actionItem->actionString << endl;
#else
	cout << "[dfw debug] list element: type = " << actionItem->actionType << " category = "
	<< actionItem->categoryId << " action = " << actionItem->actionString << endl;
#endif

    unique_lock<mutex> lck(mem_data_mutex);

    while(mem_ref_count > 0){
		mem_data_cv.wait(lck);
    }
	
	switch(actionItem->actionType)
	{
#ifdef IMGMATCH_BUSINESS
		case AddImageBiz:
			addImagesBiz(actionItem->categoryId, actionItem->bizId, actionItem->actionString);
			break;
#else
		case AddImage:
			addImages(actionItem->categoryId, actionItem->actionString);
			break;
#endif
		case RemoveImage:
			removeImages(actionItem->categoryId, actionItem->actionString);
			break;
		default:
			logTime();
			imgGlobal.logHandle << "Wrong action type found: " << actionItem->actionType << endl;
			imgGlobal.logHandle.flush();
	}

	lck.unlock();

	delete actionItem;

	b_changed = true;
}

void addImages(int categoryId, string actionString)
{
	size_t posHead, posEnd, posFind;
	string strImageId, strImagePath;

	posHead = 0;

	while((posEnd = actionString.find(IMGMATCH_BLOCK_MARKER, posHead)) != string::npos)
	{
		string strAction = actionString.substr(posHead, posEnd - posHead);

		posFind = strAction.find(IMGMATCH_COMMAND_MARKER, 0);
	    if(posFind == string::npos)
		{
			logTime();
			imgGlobal.logHandle << "Wrong add string: " << actionString << endl;
			imgGlobal.logHandle.flush();
			cout << "[dfw debug]: invaild add string " << actionString << endl;

			continue;
		}

		posHead = posEnd + 1;

		strImageId = strAction.substr(0, posFind);
		strImagePath = strAction.substr(posFind + 1);

		addImage(categoryId, stol(strImageId, nullptr), strImagePath.c_str());
	}
}

void removeImages(int categoryId, string actionString)
{
	size_t posHead, posEnd;
	string strImageId;

	posHead = 0;

	while((posEnd = actionString.find(IMGMATCH_BLOCK_MARKER, posHead)) != string::npos)
	{
		strImageId = actionString.substr(posHead, posEnd - posHead);

		posHead = posEnd + 1;

		removeID(categoryId, stol(strImageId, nullptr));
	}
}

void addImagesBiz(int categoryId, int bizId, string actionString)
{
	size_t posHead, posEnd, posFind;
	string strImageId, strAssociatedId, strImagePath, strAction, strAssociated;

	posHead = 0;

	while((posEnd = actionString.find(IMGMATCH_BLOCK_MARKER, posHead)) != string::npos)
	{
		strAction = actionString.substr(posHead, posEnd - posHead);
		posHead = posEnd + 1;

		posFind = strAction.find(IMGMATCH_COMMAND_MARKER, 0);
	    if(posFind == string::npos)
		{
			logTime();
			imgGlobal.logHandle << "Wrong add string1: " << actionString << endl;
			imgGlobal.logHandle.flush();
			cout << "[dfw debug]: invaild add string1 " << actionString << endl;

			continue;
		}

		strImageId = strAction.substr(0, posFind);

		strAssociated = strAction.substr(posFind + 1);

		posFind = strAssociated.find(IMGMATCH_COMMAND_MARKER, 0);
	    if(posFind == string::npos)
		{
			logTime();
			imgGlobal.logHandle << "Wrong add string2: " << actionString << endl;
			imgGlobal.logHandle.flush();
			cout << "[dfw debug]: invaild add string2 " << actionString << endl;

			continue;
		}

		strAssociatedId = strAssociated.substr(0, posFind);
		strImagePath = strAssociated.substr(posFind + 1);

		addImageBiz(categoryId, bizId, stol(strImageId, nullptr), stol(strAssociatedId, nullptr), strImagePath.c_str());
	}
}

/* static function */
static bool initEnv(char *config_file)
{
#define CONF_MARKER             "="
#define CONF_NODE_TYPE          "node_type"
#define CONF_NODE_SINGLE        "single"
#define CONF_NODE_CLUSTER       "cluster"
#define CONF_TRANS_TYPE         "trans_type"
#define CONF_TRANS_NETWORKSOCKET "network_socket"
#define CONF_TRANS_UNIXSOCKET   "unix_socket"
#define CONF_TRANS_RPC          "rpc"
#define CONF_PORT               "port"
#define CONF_BACKLOG            "backlog"

    string file_line;
    ifstream conf_file(config_file);

    if(!conf_file.is_open())
    {
        cout << "Error to open the configuration file: " << config_file << endl;

        return false;
    }

    while(getline(conf_file, file_line))
    {
        size_t pos = file_line.find(CONF_MARKER);

        if(pos == string::npos)
            continue;

        string pre_str = file_line.substr(0, pos);
        string post_str = file_line.substr(pos + 1);

        if(pre_str.compare(CONF_NODE_TYPE) == 0)
        {
            if(post_str.compare(CONF_NODE_SINGLE) == 0)
                imgGlobal.isCluster = false;
            else
                imgGlobal.isCluster = true;
        }
        else if(pre_str.compare(CONF_TRANS_TYPE) == 0)
        {
            if(post_str.compare(CONF_TRANS_UNIXSOCKET) == 0)
                imgGlobal.transType = UnixSocket;
            else if(post_str.compare(CONF_TRANS_RPC) == 0)
                imgGlobal.transType = Rpc;
            else
                imgGlobal.transType = NetworkSocket;
        }
        else if(pre_str.compare(CONF_PORT) == 0)
            imgGlobal.port = atoi(post_str.c_str());
        else if(pre_str.compare(CONF_BACKLOG) == 0)
            imgGlobal.backlog = atoi(post_str.c_str());
    }

    conf_file.close();

	/* [dfw todo]: temporary solution, used for flushing memory data to disk file */
	c_start = std::clock();
	b_changed = false;

    return true;
}

static void printHelp()
{
	cout << "imgMatch is a high-performance image matching server." << endl
		<<  "Usage:" << endl
		<<  "  -h: show help message" << endl
		<<  "  imgMatch.out config_file db_file log_file: startup the imgMatch server" << endl
		<<  endl
		<<  "Client can send commands to imgMatch server through socket to add images, delete images, and query images by matching." << endl
		<<  "Command format:" << endl
		<<  "  add image     - add:category_id:image_id:image_path;image_id:image_path;...;image_id:image_path;" << endl
		<<  "  delete image  - del:category_id:image_id;image_id;...;image_id;" << endl
		<<	"  query by id   - query_id:category_id:image_id:number" << endl
		<<  "  query by path - query_path:category_id:number:image_path" << endl
		<<  endl
		<<  "Note:" << endl
		<<  "  1. The maximum command length for add and delete is 1k" << endl
		<<  "  2. The maximum number for query is 100" << endl;
}

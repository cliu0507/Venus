/******************************************************************************
imgMatch ::  high-performance image matching server
---------------------------------------
begin                : Mon Sep 29 2014
email                : wtfm2000@gmail.com

Copyright (C) 2014-2014 Dongfeng Wang
 ******************************************************************************/

#ifndef IMGMATCH_H
#define IMGMATCH_H

#include <list>
#include <queue>

/* [dfw]: normal users and business users have different memory caches. This way,
		  we have two benefits: 1. search is fast. 2. we can provide cloud service
		  to the business users.
*/
#ifdef IMGMATCH_BUSINESS
#define IMGMATCH_VERSION	2
#else
#define IMGMATCH_VERSION	1
#endif

/* global type declare */
#define IMGMATCH_COMMAND_MARKER     ":"
#define IMGMATCH_BLOCK_MARKER		";"
#define IMGMATCH_COMMAND_ADD        "add"
#define IMGMATCH_COMMAND_REMOVE     "del"
#define IMGMATCH_COMMAND_ADDBIZ     "addBiz"
#define IMGMATCH_COMMAND_REMOVEBIZ  "delBiz"
#define IMGMATCH_COMMAND_QUERYID    "query_id"
#define IMGMATCH_COMMAND_QUERYPATH  "query_path"
#define IMGMATCH_COMMAND_QUERYPATHC "query_pathC"	/* cloud service for query by path */

enum ImgCategory
{
	CategoryMin = 0,
    Cloth,
    Hat,
    Shoe,
    Bag,
    StarFace,
	CategoryMax
};

enum ImgTransType
{
    NetworkSocket = 1,  /* different machine */
    UnixSocket,         /* same machine */
    Rpc                 /* same machine but using RPC (performance would be worse than unix socket) */
};

/* it may not be useful to know the db type, but it's no harm to know. */
enum ImgDbType
{
    MySql = 1,
    Oracle,
    SqlServer,
    Db2
};

class ImgGlobal
{
public:

    ImgGlobal()
    {
        domainId = 1;
        isCluster = false;
        transType = NetworkSocket;
        port = 8117;
        backlog = 1000;
    }

    ~ImgGlobal()
    {
    }

    int domainId;
    /* If it's cluster, then for "add", we'll just update local cache;
       for "remove", if the id is not local, we need to broadcast to all
       the peers (message has a special tag so that the receiver won't broadcast it again);
       for "query", we need to broadcast to all the peers and collect their results to do a
       heap sort (message has a special tag so that the receiver won't broadcast it again).

       Cluster architecture requires that each web server is with one imgMatch server. This way
       we don't need a explicit load balancer for the imgMatch server.
    */
    bool isCluster;
    ImgTransType transType;
    int port;
    int backlog;
	std::ofstream logHandle;
	char *dbFileName;
};

/* in-memory list for add & remove image */
enum ImgAction
{
    AddImage = 1,
    RemoveImage,
	AddImageBiz
};

#ifdef IMGMATCH_BUSINESS
class imgMatchAction {
public:
    imgMatchAction(ImgAction imgAction, int imgCategory, int imgBiz, std::string passedActionString) {
        actionType = imgAction;
        categoryId = imgCategory;
		bizId = imgBiz;
        actionString = passedActionString;
    }

    ~imgMatchAction() {
    }

    ImgAction actionType;
    int categoryId;
	int bizId;
    std::string actionString;
};
#else
class imgMatchAction {
public:
    imgMatchAction(ImgAction imgAction, int imgCategory, std::string passedActionString) {
        actionType = imgAction;
        categoryId = imgCategory;
        actionString = passedActionString;
    }

    ~imgMatchAction() {
    }

    ImgAction actionType;
    int categoryId;
    std::string actionString;
};
#endif

typedef std::list<imgMatchAction*> imgMatchAction_list;

class DistItem
{
public:
	long int id;
	double score;

	DistItem(long int pass_id, double pass_score)
	{
		id = pass_id;
		score = pass_score;
	}

	DistItem() {
	}

	~DistItem()
	{
	}

	bool operator< (const DistItem & right) const {
		return score < (right.score);
	}
};

typedef std::priority_queue < DistItem > distMapQueue;

/* global function declare */
char* logTime();
void maintenanceThread();
void flushToDisk();
void doingAction(imgMatchAction *actionItem);
void addImages(int categoryId, std::string actionString);
void removeImages(int categoryId, std::string actionString);
void addImagesBiz(int categoryId, int bizId, std::string actionString);
void removeImagesBiz(int categoryId, int bizId, std::string actionString);

#endif

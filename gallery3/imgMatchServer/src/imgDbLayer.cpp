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

/* STL Includes */
#include <fstream>
#include <iostream>

using namespace std;

/* imgMatch include */
#include "imgMatch.h"

/* global variable */
extern ImgGlobal imgGlobal;
extern int addImageFromDb(const int dbId, const int bizId, const long int id, const long int associatedId, 
						const int width, const int height, char *sig1, char* sig2, char* sig3, char *avgl);

#define COL_ID				"ID"
#define COL_DBID			"DBID"
#define COL_BIZID			"BIZID"
#define COL_ASSOCIATEDID	"ASSOCIATEDID"
#define COL_WIDTH			"WIDTH"
#define COL_HEIGHT			"HEIGHT"
#define COL_SIG1			"SIG1"
#define COL_SIG2			"SIG2"
#define COL_SIG3			"SIG3"
#define COL_AVGL			"AVGL"
#define COL_IMGLOC			"IMGLOC"

#ifdef IMGMATCH_BUSINESS
#define CHECK_POINT			10
#else
#define CHECK_POINT			8
#endif

#define BUFFER_LEN			200

#define IMGDBLAYER_SQL_CREATEMAIN	"CREATE TABLE IF NOT EXISTS IMGMATCH_MAIN("	\
									"ID INTEGER PRIMARY KEY NOT NULL,"			\
									"DBID         INTEGER   NOT NULL,"			\
									"BIZID        INTEGER,"						\
									"ASSOCIATEDID INTEGER,"						\
									"WIDTH        INTEGER   NOT NULL,"			\
									"HEIGHT       INTEGER   NOT NULL,"			\
									"SIG1         TEXT      NOT NULL,"			\
									"SIG2         TEXT      NOT NULL,"			\
									"SIG3         TEXT      NOT NULL,"			\
									"AVGL         TEXT      NOT NULL,"			\
									"IMGLOC       TEXT );"

#define IMGDBLAYER_SQL_SELECTCOMMON "SELECT ID, DBID, WIDTH, HEIGHT, SIG1, "  	\
									"SIG2, SIG3, AVGL FROM IMGMATCH_MAIN"

#define IMGDBLAYER_SQL_SELECTBIZ    "SELECT ID, DBID, BIZID, ASSOCIATEDID, "  	\
									"WIDTH, HEIGHT, SIG1, SIG2, SIG3, AVGL FROM IMGMATCH_MAIN"

#define IMGDBLAYER_SQL_DEL			"DELETE FROM IMGMATCH_MAIN where ID ="

#define IMGDBLAYER_SQL_ADDCOMMON	"INSERT INTO IMGMATCH_MAIN (ID, DBID,"		\
									"WIDTH, HEIGHT, SIG1, SIG2, SIG3, AVGL) VALUES"

#define IMGDBLAYER_SQL_ADDBIZ		"INSERT INTO IMGMATCH_MAIN (ID, DBID, BIZID, ASSOCIATEDID,"		\
									"WIDTH, HEIGHT, SIG1, SIG2, SIG3, AVGL) VALUES"

/* forward declaration */
static int sel_callback(void *notUsed, int argc, char **argv, char **azColName);

/* load db from disk */
bool loadDbFromDisk(char *dbFileName)
{
	char *zErrMsg = 0;
	int  rc;

	/* open the database, create if not exists */
	rc = sqlite3_open(dbFileName, &(imgGlobal.db));

	if(rc)
	{
		fprintf(stderr, "Can't open database: %s\n", sqlite3_errmsg(imgGlobal.db));

		return false;
	}
	else
	{
		fprintf(stdout, "Open database successfully\n");
	}

	/* create main table if not exists */
	rc = sqlite3_exec(imgGlobal.db, IMGDBLAYER_SQL_CREATEMAIN, NULL, 0, &zErrMsg);

	if(rc != SQLITE_OK )
	{
		fprintf(stderr, "SQL error when creating main table: %s\n", zErrMsg);

		sqlite3_free(zErrMsg);

		sqlite3_close(imgGlobal.db);
		return false;
	}

	/* select from main table */
	fprintf(stdout, "Start reading data from db ...\n");

#ifdef IMGMATCH_BUSINESS
	rc = sqlite3_exec(imgGlobal.db, IMGDBLAYER_SQL_SELECTBIZ, sel_callback, 0, &zErrMsg);
#else
	rc = sqlite3_exec(imgGlobal.db, IMGDBLAYER_SQL_SELECTCOMMON, sel_callback, 0, &zErrMsg);
#endif

	if(rc != SQLITE_OK )
	{
		fprintf(stderr, "SQL error when selecting from main table: %s\n", zErrMsg);

		sqlite3_free(zErrMsg);

		sqlite3_close(imgGlobal.db);
		return false;
	}

	fprintf(stdout, "Finished reading data from db\n");

    return true;
}

/* add image to db */
bool addToDb(const int dbId, const int bizId, const long int id, const long int associatedId, 
			 const int width, const int height, const char *sig1, const char *sig2, const char *sig3,
			 const char *avgl, char *imgLoc)
{
	/* [dfw todo]: is this buffer too big? */
	char add_sql[2000];
	char *zErrMsg = 0;
	int  rc;

	memset(add_sql, 0, 2000);
#ifdef IMGMATCH_BUSINESS
	sprintf(add_sql, "%s(%ld,%d,%d,%ld,%d,%d,'%s','%s','%s','%s');", IMGDBLAYER_SQL_ADDBIZ, id, dbId,
				bizId, associatedId, width, height, sig1, sig2, sig3, avgl);
#else
	sprintf(add_sql, "%s(%ld,%d,%d,%d,'%s','%s','%s','%s');", IMGDBLAYER_SQL_ADDCOMMON, id, dbId,
				width, height, sig1, sig2, sig3, avgl);
#endif

	printf("addToDb: sql = %s\n", add_sql);

	/* add the record */
	rc = sqlite3_exec(imgGlobal.db, add_sql, NULL, 0, &zErrMsg);

	if(rc != SQLITE_OK )
	{
		printf("addToDb: error add sql = %s error = %s\n", add_sql, zErrMsg);

		logTime();
		imgGlobal.logHandle << "Error adding id: " << id << " error: " << zErrMsg << endl;
		imgGlobal.logHandle.flush();

		return false;
	}

    return true;
}

/* delete from db */
bool delFromDb(long int id)
{
	char del_sql[100];
	char *zErrMsg = 0;
	int  rc;

	memset(del_sql, 0, 100);
	sprintf(del_sql, "%s%ld", IMGDBLAYER_SQL_DEL, id);

	/* delete the record */
	rc = sqlite3_exec(imgGlobal.db, del_sql, NULL, 0, &zErrMsg);

	if(rc != SQLITE_OK )
	{
		logTime();
		imgGlobal.logHandle << "Error deleting id: " << id << " error: " << zErrMsg << endl;
		imgGlobal.logHandle.flush();

		return false;
	}

    return true;
}

static int sel_callback(void *notUsed, int argc, char **argv, char **azColName)
{
	long int id, associatedId;
	int dbId, bizId, width, height;
	char *sig1, *sig2, *sig3, *avgl;
	int checker = 0;

	for(int i = 0; i < argc; i++)
	{
		if(strcmp(azColName[i], COL_ID) == 0)
		{
			id = atol(argv[i]);
			checker++;
		}
		else if(strcmp(azColName[i], COL_DBID) == 0)
		{
			dbId = atoi(argv[i]);
			checker++;
		}
		else if(strcmp(azColName[i], COL_BIZID) == 0)
		{
			bizId = atoi(argv[i]);
			checker++;
		}
		else if(strcmp(azColName[i], COL_ASSOCIATEDID) == 0)
		{
			associatedId = atol(argv[i]);
			checker++;
		}
		else if(strcmp(azColName[i], COL_WIDTH) == 0)
		{
			width = atoi(argv[i]);
			checker++;
		}
		else if(strcmp(azColName[i], COL_HEIGHT) == 0)
		{
			height = atoi(argv[i]);
			checker++;
		}
		else if(strcmp(azColName[i], COL_SIG1) == 0)
		{
			sig1 = argv[i];
			checker++;
		}
		else if(strcmp(azColName[i], COL_SIG2) == 0)
		{
			sig2 = argv[i];
			checker++;
		}
		else if(strcmp(azColName[i], COL_SIG3) == 0)
		{
			sig3 = argv[i];
			checker++;
		}
		else if(strcmp(azColName[i], COL_AVGL) == 0)
		{
			avgl = argv[i];
			checker++;
		}
		else
		{
			logTime();
			imgGlobal.logHandle << "Wrong column when loading from db: " << azColName[i] << endl;
			imgGlobal.logHandle.flush();

			return 0;
		}
	}

	if(checker == CHECK_POINT)
	{
		addImageFromDb(dbId, bizId, id, associatedId, width, height, sig1, sig2, sig3, avgl);
	}
	else
	{
		logTime();
		imgGlobal.logHandle << "Not enough columns readed when loading from db!" << endl;
		imgGlobal.logHandle.flush();
	}

	return 0;
}

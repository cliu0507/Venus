/******************************************************************************
imgMatch ::  high-performance image matching server
---------------------------------------
begin                : Mon Sep 29 2014
email                : wtfm2000@gmail.com

Copyright (C) 2014-2014 Dongfeng Wang
 ******************************************************************************/

#ifndef IMGDBLAYER_H
#define IMGDBLAYER_H

/* global type declare */
#define CONTENT_SEP			":"

/* global function declare */
bool loadDbFromDisk(char *dbFileName);
bool addToDb(const int dbId, const int bizId, const long int id, const long int associatedId, 
			 const int width, const int height, const char *sig1, const char *sig2, 
			 const char *sig3, const char *avgl, char *imgLoc);
bool delFromDb(long int id);

#endif

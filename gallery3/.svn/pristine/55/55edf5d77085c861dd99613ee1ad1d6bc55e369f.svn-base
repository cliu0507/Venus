/******************************************************************************
imgMatch ::  high-performance image matching server
---------------------------------------
begin                : Mon Sep 29 2014
email                : wtfm2000@gmail.com

Copyright (C) 2014-2014 Dongfeng Wang
 ******************************************************************************/

#ifndef IMGTRANSLAYER_H
#define IMGTRANSLAYER_H

/* global type declare */
#define MAX_PORT_LEN    8
#define MAX_BUF_SIZE    1000    /* [dfw todo]: is this buffer size too big or too small? */ 

enum ImgRequest
{
    AddImg = 1,
    RemoveImg,
    MatchById,
    MatchByPath
};

/* global function declare */
bool startServer();
void handlerThread(int new_fd);

#endif

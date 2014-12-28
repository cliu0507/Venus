/******************************************************************************
imgMatch ::  high-performance image matching server
---------------------------------------
begin                : Mon Sep 29 2014
email                : wtfm2000@gmail.com

Copyright (C) 2014-2014 Dongfeng Wang
 ******************************************************************************/

#ifndef IMGPROCESSLAYER_H
#define IMGPROCESSLAYER_H

/* STL Includes */
#include <queue>

/* Number of pixels on one side of image; required to be a power of 2. */
#define	NUM_PIXELS		128
/* Totals pixels in a square image. */
#define NUM_PIXELS_SQUARED	(NUM_PIXELS * NUM_PIXELS)
/* Number of Haar coeffients we retain as signature for an image. */
#define NUM_COEFS		40

#define UNIT_IS_DOUBLE

#undef ABS
#ifdef UNIT_IS_DOUBLE
#define ABS(x)	fabs(x)
typedef double	Unit;
#else
#define UNIT_IS_INT
#define ABS(x)	abs(x)
typedef int	Unit;
#endif

typedef int Idx;

/* signature structure */
typedef struct valStruct_{
  Unit d;			/* [f]abs(a[i]) */
  int i;			/* index i of a[i] */
  bool operator< (const valStruct_ &right) const // warning: order is inverse so valqueue is ordered smallest->biggest
  {
    return d > right.d;
  }
} valStruct;

typedef std::priority_queue < valStruct > valqueue;

#define max(a, b)  (((a) > (b)) ? (a) : (b))
#define min(a, b)  (((a) > (b)) ? (b) : (a))

void initImgBin();
void transform(Unit* a, Unit* b, Unit* c);
void transformChar(unsigned char* c1, unsigned char* c2, unsigned char* c3, Unit* a, Unit* b, Unit* c);
int calcHaar(Unit* cdata1, Unit* cdata2, Unit* cdata3, Idx* sig1, Idx* sig2, Idx* sig3, double * avgl);

#endif

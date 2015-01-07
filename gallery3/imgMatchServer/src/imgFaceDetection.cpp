/******************************************************************************
imgFaceDetection :: face detection. This file is based on openCV object detection
                    modules and modified for imgMatch usage. We only process 1 face
                    case for now because it is impossible to know whom is looked
                    at by user.
 
---------------------------------------
begin            : Nov 01 2014
email            : taohe76@gmail.com

Copyright (C) 2014-2014 Tao He
 ******************************************************************************/

#include "cv.h" 
#include "highgui.h" 

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <assert.h>
#include <math.h>
#include <float.h>
#include <limits.h>
#include <time.h>
#include <ctype.h>

#include "imgFaceDetection.h"

// Create a string that contains the exact cascade name
const char* cascade_name =
    "/var/www/gallery3/imgMatchServer/src_cv/opencv/data/haarcascades/haarcascade_frontalface_alt.xml";

// Function prototype for detecting a face from an image
int detectFace( const long int id, IplImage* image );

// Main function, defines the entry point for the program.
int getFaceDetectedImage( const long int id, const char *filename )
{
    int rt = 0;

    // load input image
    IplImage *img = cvLoadImage(filename);

    // Call the function to detect and draw the face positions
    rt = detectFace(id, img);

    // Release the image
    cvReleaseImage(&img);

    // return 0 to indicate we will not process this image 
    return rt;
}

// Function to detect any faces that is present in an image
int detectFace( const long int id, IplImage* img )
{

    // Create memory for calculations
    static CvMemStorage* storage = 0;

    // Create a new Haar classifier
    static CvHaarClassifierCascade* cascade = 0;

    // Load the [[HaarClassifierCascade]]
    cascade = (CvHaarClassifierCascade*)cvLoad( cascade_name, 0, 0, 0 );

    // Check whether the cascade has loaded successfully. Else report and error and quit
    if( !cascade )
    {
        fprintf( stderr, "ERROR: Could not load classifier cascade\n" );
        return 0;
    }

    // Allocate the memory storage
    storage = cvCreateMemStorage(0);

    // Clear the memory storage which was used before
    cvClearMemStorage( storage );

    // Find whether the cascade is loaded, to find the faces. If yes, then:
    if( cascade )
    {

        // There can be more than one face in an image. So create a growable sequence of faces.
        // Detect the objects and store them in the sequence
        CvSeq* faces = cvHaarDetectObjects( img, cascade, storage,
                                            1.1, 2, CV_HAAR_DO_CANNY_PRUNING,
                                            cvSize(40, 40) );

        // printf("Tao:: face total = %d\n", faces->total);
        // if only one face exists in the image, we crop this image to contain the people only
        // otherwise we won't process this image
        if (faces->total == 1)
        {
            CvRect* r = (CvRect*)cvGetSeqElem( faces, 0 );
            char *output_filename, str[64];

            sprintf(str,"%lu",id);
            output_filename = strcat(str, ".jpg");

            r->x      = r->x - r->width;
            r->width  *= 3; // body width is about 3 times of face width
            r->height *= 8; // body height is about 8 times of face height
           
            // adjust the cropped picture size 
            r->x = (r->x<0) ? 0 : r->x;
            r->width = (r->width > img->width) ? img->width : r->width;
            r->height = (r->height > img->height) ? img->height : r->height;

            IplImage* imgRoi   = cvCloneImage(img);
            cvSetImageROI(imgRoi, *r);
            cvSaveImage(output_filename, imgRoi);

            cvReleaseImage(&imgRoi); 
        }
        else
        {
            return 0; 
        }
    }

    return 1; // successfuly find a face
}

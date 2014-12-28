LINKFLAGS=-lMagick++ -lMagickWand -lMagickCore -llcms -ltiff -lfreetype -ljpeg -llqr-1 -lglib-2.0 -lfontconfig -lXext -lSM -lICE -lX11 -lXt -lbz2 -lz -lm -lgomp -lpthread -lltdl
CFLAGS=-DImMagick -DLinuxBuild -g -O2 -fstack-protector --param=ssp-buffer-size=4 -Wformat -Wformat-security -pthread -I/usr/include/ImageMagick

all : testClient.o testClientBusiness.o
	g++ -o testClient.out testClient.o $(LINKFLAGS)
	g++ -o testClientBusiness.out testClientBusiness.o $(LINKFLAGS)

testClient.o :
	gcc -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -c testClient.cpp -o testClient.o $(CFLAGS)
testClientBusiness.o :
	gcc -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -c testClientBusiness.cpp -o testClientBusiness.o $(CFLAGS)

clean :
	rm -f *.o *.out

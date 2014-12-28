LINKFLAGS=-lMagick++ -lMagickWand -lMagickCore -llcms -ltiff -lfreetype -ljpeg -llqr-1 -lglib-2.0 -lfontconfig -lXext -lSM -lICE -lX11 -lXt -lbz2 -lz -lm -lgomp -lpthread -lltdl
CFLAGS=-DImMagick -DLinuxBuild -g -O2 -fstack-protector --param=ssp-buffer-size=4 -Wformat -Wformat-security -pthread -I/usr/include/ImageMagick

all : imgMatch.o imgProcessLayer.o imgMemLayer.o imgTransLayer.o
	g++ -o imgMatch.out output/imgMatch.o output/imgProcessLayer.o output/imgMemLayer.o output/imgTransLayer.o $(LINKFLAGS)

business : imgMatchBiz.o imgProcessLayerBiz.o imgMemLayerBiz.o imgTransLayerBiz.o
	g++ -o imgMatchBusiness.out output/imgMatchBiz.o output/imgProcessLayerBiz.o output/imgMemLayerBiz.o output/imgTransLayerBiz.o $(LINKFLAGS)

imgMatch.o :
	gcc -std=c++0x -pthread -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -c src/imgMatch.cpp -o output/imgMatch.o $(CFLAGS)
imgProcessLayer.o :
	gcc -pthread -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -c src/imgProcessLayer.cpp -o output/imgProcessLayer.o $(CFLAGS)
imgMemLayer.o :
	gcc -pthread -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -c src/imgMemLayer.cpp -o output/imgMemLayer.o $(CFLAGS)
imgTransLayer.o :
	gcc -std=c++0x -pthread -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -c src/imgTransLayer.cpp -o output/imgTransLayer.o $(CFLAGS)

imgMatchBiz.o :
	gcc -std=c++0x -pthread -fno-strict-aliasing -DNDEBUG -DIMGMATCH_BUSINESS -g -fwrapv -O2 -Wall -fPIC -c src/imgMatch.cpp -o output/imgMatchBiz.o $(CFLAGS)
imgProcessLayerBiz.o :
	gcc -pthread -fno-strict-aliasing -DNDEBUG -DIMGMATCH_BUSINESS -g -fwrapv -O2 -Wall -fPIC -c src/imgProcessLayer.cpp -o output/imgProcessLayerBiz.o $(CFLAGS)
imgMemLayerBiz.o :
	gcc -pthread -fno-strict-aliasing -DNDEBUG -DIMGMATCH_BUSINESS -g -fwrapv -O2 -Wall -fPIC -c src/imgMemLayer.cpp -o output/imgMemLayerBiz.o $(CFLAGS)
imgTransLayerBiz.o :
	gcc -std=c++0x -pthread -fno-strict-aliasing -DNDEBUG -DIMGMATCH_BUSINESS -g -fwrapv -O2 -Wall -fPIC -c src/imgTransLayer.cpp -o output/imgTransLayerBiz.o $(CFLAGS)

clean :
	rm -f imgMatch.out imgMatchBusiness.out output/*.o

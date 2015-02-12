LINKFLAGS=-lMagick++ -lMagickWand -lMagickCore -llcms -ltiff -lfreetype -ljpeg -llqr-1 -lglib-2.0 -lfontconfig -lXext -lSM -lICE -lX11 -lXt -lbz2 -lz -lm -lgomp -lpthread -lltdl
CFLAGS=-DImMagick -DLinuxBuild -g -O2 -fstack-protector --param=ssp-buffer-size=4 -Wformat -Wformat-security -pthread -I/usr/include/ImageMagick

all : imgMatch.o imgProcessLayer.o imgMemLayer.o imgTransLayer.o imgDbLayer.o sqlite3.o shell.o
	g++ -o imgMatch.out output/imgMatch.o output/imgProcessLayer.o output/imgMemLayer.o output/imgTransLayer.o output/imgDbLayer.o output/sqlite3.o $(LINKFLAGS)
	gcc -o db_shell.out output/shell.o output/sqlite3.o

business : imgMatchBiz.o imgProcessLayerBiz.o imgMemLayerBiz.o imgTransLayerBiz.o imgDbLayerBiz.o sqlite3.o
	g++ -o imgMatchBusiness.out output/imgMatchBiz.o output/imgProcessLayerBiz.o output/imgMemLayerBiz.o output/imgTransLayerBiz.o output/imgDbLayerBiz.o output/sqlite3.o $(LINKFLAGS)

imgMatch.o :
	gcc -std=c++0x -pthread -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -c src/imgMatch.cpp -o output/imgMatch.o $(CFLAGS)
imgProcessLayer.o :
	gcc -pthread -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -c src/imgProcessLayer.cpp -o output/imgProcessLayer.o $(CFLAGS)
imgMemLayer.o :
	gcc -pthread -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -c src/imgMemLayer.cpp -o output/imgMemLayer.o $(CFLAGS)
imgTransLayer.o :
	gcc -std=c++0x -pthread -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -c src/imgTransLayer.cpp -o output/imgTransLayer.o $(CFLAGS)
imgDbLayer.o :
	gcc -pthread -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -c src/imgDbLayer.cpp -o output/imgDbLayer.o $(CFLAGS)
sqlite3.o :
	gcc -pthread -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -DSQLITE_THREADSAFE=0 -DSQLITE_OMIT_LOAD_EXTENSION -c src/sqlite3.c -o output/sqlite3.o
shell.o :
	gcc -DSQLITE_THREADSAFE=0 -DSQLITE_OMIT_LOAD_EXTENSION -c src/shell.c -o output/shell.o

imgMatchBiz.o :
	gcc -std=c++0x -pthread -fno-strict-aliasing -DNDEBUG -DIMGMATCH_BUSINESS -g -fwrapv -O2 -Wall -fPIC -c src/imgMatch.cpp -o output/imgMatchBiz.o $(CFLAGS)
imgProcessLayerBiz.o :
	gcc -pthread -fno-strict-aliasing -DNDEBUG -DIMGMATCH_BUSINESS -g -fwrapv -O2 -Wall -fPIC -c src/imgProcessLayer.cpp -o output/imgProcessLayerBiz.o $(CFLAGS)
imgMemLayerBiz.o :
	gcc -pthread -fno-strict-aliasing -DNDEBUG -DIMGMATCH_BUSINESS -g -fwrapv -O2 -Wall -fPIC -c src/imgMemLayer.cpp -o output/imgMemLayerBiz.o $(CFLAGS)
imgTransLayerBiz.o :
	gcc -std=c++0x -pthread -fno-strict-aliasing -DNDEBUG -DIMGMATCH_BUSINESS -g -fwrapv -O2 -Wall -fPIC -c src/imgTransLayer.cpp -o output/imgTransLayerBiz.o $(CFLAGS)
imgDbLayerBiz.o :
	gcc -pthread -fno-strict-aliasing -DNDEBUG -g -fwrapv -O2 -Wall -fPIC -c src/imgDbLayer.cpp -o output/imgDbLayerBiz.o $(CFLAGS)

clean :
	rm -f imgMatch.out imgMatchBusiness.out db_shell.out output/*.o

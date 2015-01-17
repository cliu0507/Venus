/*
** client.c -- a stream socket client test program
*/

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <errno.h>
#include <string>
#include <string.h>
#include <netdb.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <sys/socket.h>
#include <arpa/inet.h>
#include <iostream>
#include <thread>

static const int num_threads = 10;

using namespace std;

void sendCommand(struct addrinfo *servinfo, const char *command, bool isQuery, int expected_id = 0, int expected_percentage = 90)
{
    int sockfd;
    struct addrinfo *p;

    // loop through all the results and connect to the first we can
    for(p = servinfo; p != NULL; p = p->ai_next) {
        if ((sockfd = socket(p->ai_family, p->ai_socktype, p->ai_protocol)) == -1) {
            perror("client: socket");
            continue;
        }

        if (connect(sockfd, p->ai_addr, p->ai_addrlen) == -1) {
            close(sockfd);
            perror("client: connect");
            continue;
        }

        break;
    }

    if (p == NULL) {
        fprintf(stderr, "client: failed to connect\n");
        return;
    }

    printf("client: connected! sending command %s\n", command);

    if (send(sockfd, command, strlen(command), 0) == -1) {
        perror("send command addImage");
    }

	if(isQuery)
	{
		const int BUFFER_SIZE = 10000;
		const int SMALL_BUFFER_SIZE = 1000;
		char buf[BUFFER_SIZE];
		int numbytes;

	    if ((numbytes = recv(sockfd, buf, BUFFER_SIZE - 1, 0)) == -1) {
		    perror("recv query result");
			return;
		}

		buf[numbytes] = '\0';
		printf("Query result = %s\n", buf);
		
		char *saveptr1, *saveptr2;
		
		char* token = strtok_r(buf, ";", &saveptr1);
		bool passed = false;
		while (token != NULL) {
			//printf ("%s\n", token);
            string idpercentage(token);
			int npos = idpercentage.find(':');
			string id = idpercentage.substr(0, npos);
			string percentage = idpercentage.substr(npos + 1);
			
			//std::cout << id << " : " << percentage << std::endl;
			
			if (atoi(id.c_str()) == expected_id && atoi(percentage.c_str()) > expected_percentage) {
				//printf("Pass: %s, %s - %s\n", command, id.c_str(), percentage.c_str());
				passed = true;
				break;
			}
			
			token = strtok_r(NULL, ";", &saveptr1);
		}
		
		if (!passed) {
			//printf("Failed: %s\n", command);
		}
	}

    close(sockfd);
}

int main(int argc, char *argv[])
{
    struct addrinfo hints, *servinfo;
    int rv;
    /* command format: add image     - "add:category_id:image_id:image_path"
     *                 remove image  - "del:category_id:image_id"
     *                 query by id   - "query_id:category_id:image_id:number"
     *                 query by path - "query_path:category_id:number:image_path"
     */
<<<<<<< .mine
    char *command_addImage1 = (char *)"add:1:1:/home/wtfm2000/share/src/gallery3/imgMatchServer/picture/1.jpg;2:/home/wtfm2000/share/src/gallery3/imgMatchServer/picture/2.jpg;3:/home/wtfm2000/share/src/gallery3/imgMatchServer/picture/3.jpg;";
	char *command_addImage2 = (char *)"add:1:4:/home/wtfm2000/share/src/gallery3/imgMatchServer/picture/4.jpg;5:/home/wtfm2000/share/src/gallery3/imgMatchServer/picture/5.jpg;";
    char *command_removeImage = (char *)"del:1:1;3;";
<<<<<<< .mine
    char *command_queryId = (char *)"query_id:1:3:100";
    char *command_queryPath = (char *)"query_path:1:100:/home/wtfm2000/share/src/gallery3/imgMatchServer/picture/3.jpg";
=======
    char *command_queryId = (char *)"query_id:1:81:100";
    char *command_queryPath = (char *)"query_path:1:100:/home/wtfm2000/share/svn-code/trunk/gallery3/imgMatchServer/picture/1.jpg";
=======
>>>>>>> .r39
>>>>>>> .r24


    string command_addImages[10];
	for (int j = 0; j < 10; j++) {
		command_addImages[j] = "add:1:";
		char image_url[1024];
		for (int i = 100; i < 110; i++) {
			sprintf(image_url, "%d:/home/wtfm2000/share/imgMatchServer/picture/%d.jpg;", j*10 + i + 1, j * 10 + i + 1);
			
			command_addImages[j] += image_url;
		}
	}
	string command_removeImages[5];
	for (int j = 0; j  < 5; j++) {
	     command_removeImages[j] = "del:1:";
         char image_url[1024];
	     for (int i = 0; i < 10; i++) {
	             sprintf(image_url, "%d;", j*10 + i + 101);
	             command_removeImages[j] += image_url;
	     }
	}
   //char *command_addImage1 = (char *)"add:1:1:/home/wtfm2000/share/imgMatchServer/picture/1.jpg;2:/home/wtfm2000/share/imgMatchServer/picture/2.jpg;3:/home/wtfm2000/share/imgMatchServer/picture/3.jpg;";
	//char *command_addImage2 = (char *)"add:1:4:/home/wtfm2000/share/imgMatchServer/picture/4.jpg;5:/home/wtfm2000/share/imgMatchServer/picture/5.jpg;";
    //char *command_removeImage = (char *)"del:1:1;3;";
    char *command_queryId1 = (char *)"query_id:1:190:200";
	char *command_queryId2 = (char *)"query_id:1:191:200";
	char *command_queryId3= (char *)"query_id:1:192:200";
	char *command_queryId4 = (char *)"query_id:1:193:200";
	char *command_queryId5 = (char *)"query_id:1:194:200";
	char *command_queryId6 = (char *)"query_id:1:195:200";
	char *command_queryId7 = (char *)"query_id:1:196:200";
	char *command_queryId8 = (char *)"query_id:1:197:200";
	char *command_queryId9 = (char *)"query_id:1:198:200";
	char *command_queryId10 = (char *)"query_id:1:199:200";
    char *command_queryPath1 = (char *)"query_path:1:200:/home/wtfm2000/share/imgMatchServer/picture/180.jpg";
    char *command_queryPath2 = (char *)"query_path:1:200:/home/wtfm2000/share/imgMatchServer/picture/181.jpg";
    char *command_queryPath3 = (char *)"query_path:1:200:/home/wtfm2000/share/imgMatchServer/picture/182.jpg";
    char *command_queryPath4 = (char *)"query_path:1:200:/home/wtfm2000/share/imgMatchServer/picture/183.jpg";
    char *command_queryPath5 = (char *)"query_path:1:200:/home/wtfm2000/share/imgMatchServer/picture/184.jpg";
    char *command_queryPath6 = (char *)"query_path:1:200:/home/wtfm2000/share/imgMatchServer/picture/185.jpg";
    char *command_queryPath7 = (char *)"query_path:1:200:/home/wtfm2000/share/imgMatchServer/picture/186.jpg";
    char *command_queryPath8 = (char *)"query_path:1:200:/home/wtfm2000/share/imgMatchServer/picture/187.jpg";
    char *command_queryPath9 = (char *)"query_path:1:200:/home/wtfm2000/share/imgMatchServer/picture/188.jpg";
    char *command_queryPath10 = (char *)"query_path:1:200:/home/wtfm2000/share/imgMatchServer/picture/189.jpg";
    if (argc != 3) {
        fprintf(stderr,"usage: hostname port\n");
        exit(1);
    }

    memset(&hints, 0, sizeof(hints));
    hints.ai_family = AF_UNSPEC;
    hints.ai_socktype = SOCK_STREAM;

    if ((rv = getaddrinfo(argv[1], argv[2], &hints, &servinfo)) != 0) {
        fprintf(stderr, "getaddrinfo: %s\n", gai_strerror(rv));
        exit(1);
    }
#if 0
    sendCommand(servinfo, command_addImage1, false);
    sendCommand(servinfo, command_addImage2, false);
    sendCommand(servinfo, command_removeImage, false);
#endif
    //sendCommand(servinfo, command_queryId, true);
    //sendCommand(servinfo, command_queryPath, true);
	std::thread queryIdThread1 = std::thread(sendCommand, servinfo, command_queryId1, true, 190, 90);
	std::thread queryIdThread2 = std::thread(sendCommand, servinfo, command_queryId2, true, 191, 90);
	std::thread queryIdThread3 = std::thread(sendCommand, servinfo, command_queryId3, true, 192, 90);
	std::thread queryIdThread4 = std::thread(sendCommand, servinfo, command_queryId4, true, 193, 90);
	std::thread queryIdThread5 = std::thread(sendCommand, servinfo, command_queryId5, true, 194, 90);
	std::thread queryIdThread6 = std::thread(sendCommand, servinfo, command_queryId6, true, 195, 90);
	std::thread queryIdThread7 = std::thread(sendCommand, servinfo, command_queryId7, true, 196, 90);
	std::thread queryIdThread8 = std::thread(sendCommand, servinfo, command_queryId8, true, 197, 90);
	std::thread queryIdThread9 = std::thread(sendCommand, servinfo, command_queryId9, true, 198, 90);
	std::thread queryIdThread10 = std::thread(sendCommand, servinfo, command_queryId10, true, 199, 90);
	std::thread queryPathThread1 = std::thread(sendCommand, servinfo, command_queryPath1, true, 180, 90);
	std::thread queryPathThread2 = std::thread(sendCommand, servinfo, command_queryPath2, true, 181, 90);
	std::thread queryPathThread3 = std::thread(sendCommand, servinfo, command_queryPath3, true, 182, 90);
	std::thread queryPathThread4 = std::thread(sendCommand, servinfo, command_queryPath4, true, 183, 90);
	std::thread queryPathThread5 = std::thread(sendCommand, servinfo, command_queryPath5, true, 184, 90);
	std::thread queryPathThread6 = std::thread(sendCommand, servinfo, command_queryPath6, true, 185, 90);
	std::thread queryPathThread7 = std::thread(sendCommand, servinfo, command_queryPath7, true, 186, 90);
	std::thread queryPathThread8 = std::thread(sendCommand, servinfo, command_queryPath8, true, 187, 90);
	std::thread queryPathThread9 = std::thread(sendCommand, servinfo, command_queryPath9, true, 188, 90);
	std::thread queryPathThread10 = std::thread(sendCommand, servinfo, command_queryPath10, true, 189, 90);	
	std::thread addThreads[num_threads];
	for (int i = 0; i < 10; i++) {
		std::cout << command_addImages[i].c_str() << std::endl;
		addThreads[i] = std::thread(sendCommand, servinfo, command_addImages[i].c_str(), false, 0, 0);
	}
	
	for (int i = 0; i < 10; i++) {
		addThreads[i].join();
	}
	
	std::thread delThreads[5];
	for (int i = 0; i < 5; i++) {
	     std::cout << command_removeImages[i].c_str() << std::endl;
		 delThreads[i] = std::thread(sendCommand, servinfo, command_removeImages[i].c_str(), false, 0, 0);
		 }
	for (int i = 5; i < 5; i++) {
		 delThreads[i].join();
    }
	
	queryIdThread1.join();
	queryIdThread2.join();
	queryIdThread3.join();
	queryIdThread4.join();
	queryIdThread5.join();
	queryIdThread6.join();
	queryIdThread7.join();
	queryIdThread8.join();
	queryIdThread9.join();
	queryIdThread10.join();
	queryPathThread1.join();
	queryPathThread2.join();
	queryPathThread3.join();
	queryPathThread4.join();
	queryPathThread5.join();
	queryPathThread6.join();
	queryPathThread7.join();
	queryPathThread8.join();
	queryPathThread9.join();
	queryPathThread10.join();
    freeaddrinfo(servinfo); // all done with this structure

    exit(0);
}

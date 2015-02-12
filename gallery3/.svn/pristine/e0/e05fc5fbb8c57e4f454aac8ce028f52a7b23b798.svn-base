/*
** testClientSingle.c -- a stream socket client test program for sequential command execution
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

using namespace std;

void sendCommand(struct addrinfo *servinfo, const char *command, bool isQuery)
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
		char buf[BUFFER_SIZE];
		int numbytes;

	    if ((numbytes = recv(sockfd, buf, BUFFER_SIZE - 1, 0)) == -1) {
		    perror("recv query result");
			return;
		}

		buf[numbytes] = '\0';

		printf("Query result = %s\n", buf);
	}

    close(sockfd);
}

int main(int argc, char *argv[])
{
    struct addrinfo hints, *servinfo;
    int rv;
	string input_command = "";

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

	while(input_command.compare("exit") != 0)
	{
		cout << endl << "Please input the following four kinds of commands (input exit to quit):" << endl
			<< "add:category_id:image_id:image_path;...;image_id:image_path;" << endl
			<< "del:category_id:image_id;...;image_id;" << endl
			<< "query_id:category_id:image_id:number" << endl
			<< "query_path:category_id:number:image_path" << endl;

		cin >> input_command;

		if(input_command.compare("exit") == 0)
		{
			break;
		}
		else if(input_command.find("query_") == string::npos)
		{
			sendCommand(servinfo, input_command.c_str(), false);
		}
		else
		{
			sendCommand(servinfo, input_command.c_str(), true);
		}
	}

    freeaddrinfo(servinfo); // all done with this structure

    exit(0);
}

#ifdef _WIN32 /* if the client is running on windows */
#include <winsock.h>
#else
#define closesocket close
#include <arpa/inet.h>
#include <sys/socket.h>
#include <unistd.h>
#endif

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <errno.h>

#define	SERVER_PORT	3000
#define SERVER_ADDR	"211.219.171.237" /* This needs to be changed when the server is moved */
#define BUF_SIZE	4096 /* 4KB=1 page size */

void clear_win_sock(){
#ifdef _WIN32
	WSACleanup();
#endif
}

int main(){
#ifdef _WIN32
	WSADATA wsa_data;
	int res = WSAStartup(MAKEWORD(2,2), &wsa_data);
	if(res != 0){
		perror("WSAStartup");
		exit(-1);
	}
#endif

	int client_sock;
	client_sock = socket(AF_INET, SOCK_STREAM, IPPROTO_TCP);
	if(client_sock < 0){
		perror("socket creation");
		closesocket(client_sock);
		clear_win_sock();
		exit(-1);
	}

	struct sockaddr_in server_addr;
	memset(&server_addr, 0, sizeof(server_addr));
	server_addr.sin_family = AF_INET;
	server_addr.sin_addr.s_addr = inet_addr(SERVER_ADDR);
	server_addr.sin_port = htons(SERVER_PORT);

	if(connect(client_sock, (struct sockaddr*)&server_addr, sizeof(server_addr)) < 0){
		perror("server connect");
		closesocket(client_sock);
                clear_win_sock();
		exit(-1);
	}

	while(1){
		/* client action happens here 
		 * prompt user for requests, 
		 * send request to server and await confirmation
		 * */

	}

	closesocket(Csocket);
	clear_win_sock();
	printf("Goodbye\n");
	system("pause");
	return (0);
}

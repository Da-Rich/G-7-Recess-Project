#ifndef CLIENT_H
#define CLIENT_H

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
#define FILE_BUF_SIZE	4096 /* 4KB=1 page size */
#define USER_BUF_SIZE	256  /* Quater kilobyte */

void clear_win_sock();
int create_socket();
void connect_to_server(int client_socket);
int initiate_data_transfer(char* opt, int client_socket);

#endif
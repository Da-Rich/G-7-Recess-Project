#include "client.h"

void clear_win_sock(){
#ifdef _WIN32
	WSACleanup();
#endif
}

int create_socket(){
    int client_sock;
	client_sock = socket(AF_INET, SOCK_STREAM, IPPROTO_TCP);
	if(client_sock < 0){
		perror("socket creation");
		closesocket(client_sock);
		clear_win_sock();
		exit(-1);
	}

    return client_sock;
}

void connect_to_server(int client_sock){
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
}

int initiate_data_transfer(char* opt, int client_sock){
    int sent = send(client_sock, opt,1,0);
    char confirm;
    if(sent < 0){
            perror("transfer initiation");
            return -1;
    }
    int recvd = recv(client_sock, &confirm, 1,0);
    if(recvd <= 0 || confirm != '1'){
            perror("ready confirmation");
            return -1;
    }

    return 0;
}
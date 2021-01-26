#include "server.h"
extern queue_t* thread_queue;
extern pthread_mutex_t memory_lock;
pthread_cond_t thread_alert;

int write_to_file(int fd, char* data, size_t len){
	
}

int accept_connection(int server_sock){
	struct sockaddr_storage client_addr;
	socklen_t client_addr_len = sizeof(client_addr);
	int client_sock = accept(server_sock, (struct sockaddr*)&client_addr, &client_addr_len);
	return client_sock;
}

void handle_client(int client_sock){
	char *buffer = (char*)malloc(MAX_BUF_SIZE);
	memset(buffer,0,MAX_BUF_SIZE);
	ssize_t recv_size = recv(client_sock, buffer, 1, 0);

	if(recv_size < 0){
		//Error: TODO
	}
	ssize_t sent_size = send(client_sock, "1", 1, 0);
	if(sent_size < 0){
		perror("send confirmation");
		goto ending;
	}

	int option =(int) (buffer[0]-'0');
	switch(option){
		case 1: { /* single patient data receive */
				recv_size = recv(client_sock, buffer, MAX_BUF_SIZE, 0);
				if(recv_size > 0){
					printf("Received from client: %s\n",buffer);
					sent_size = send(client_sock, "1", 1, 0);
				}else{
					//error
				}
				break;
			}
		case 2:{/* file receive */
			       while((recv_size = recv(client_sock, buffer, MAX_BUF_SIZE, 0)) > 0){
				       printf("Received from client: \n");
				       printf("%s",buffer);
				       sent_size = send(client_sock, "1", 1, 0);
			       }
			       break;
		       }
	}
ending:
	memset(buffer,0,MAX_BUF_SIZE);
	free(buffer);
	close(client_sock);
}

void queue_request(int conn){
	pthread_mutex_lock(&memory_lock);

	queue_push(thread_queue, conn);

	pthread_mutex_unlock(&memory_lock);

	pthread_cond_signal(&thread_alert);
}

int queue_get(){
	pthread_mutex_lock(&memory_lock);

	while(queue_is_empty(thread_queue) == 1){
		printf("Awaiting connection\n");
		if(pthread_cond_wait(&thread_alert, &memory_lock) != 0){
			perror("Thread wait error");
		}
	}

	int conn = queue_pop(thread_queue);
	if(conn < 0){/* this is not supposed to happen */
		printf("Error thread dequeue\n");
		return queue_get();
	}

	pthread_mutex_unlock(&memory_lock);
	return conn;
}

void *thread_handler(void *args){
        int client_sock = 0;

	while(1){
		client_sock = queue_get();

		printf("handling request\n");

		handle_client(client_sock);
	}
}




#include "server.h"
static volatile int run_server = 1;
queue_t* thread_queue;
pthread_mutex_t memory_lock;

void interrupt_handler(int x){
	run_server = 0;
}

int main(){
	int server_sock;
	struct sockaddr_in server_addr;

	/* creating server socket */
	if((server_sock = socket(AF_INET, SOCK_STREAM, IPPROTO_TCP)) < 0){
		printf("Unable to create server socket\n");
		exit(-1);
	}

	/* construct local address */
	memset(&server_addr, 0, sizeof(server_addr));
	server_addr.sin_family = AF_INET;
	server_addr.sin_port = htons(SERVER_PORT);
	server_addr.sin_addr.s_addr = htonl(INADDR_ANY);
	
	/* bind port to local address */
	if(bind(server_sock, (struct sockaddr*)&server_addr, sizeof(server_addr)) < 0){
		printf("Unable to bind to port\n");
		exit(-1);
	}

	if(listen(server_sock, MAX_PENDING_REQUESTS) < 0 ){
		perror("listen");
		exit(-1);
	}

	thread_queue = queue_create(MAX_HANDLER_THREADS);
	pthread_mutex_init(&memory_lock, NULL);
	pthread_t handler_threads[MAX_HANDLER_THREADS];

	for(int i=0; i<MAX_HANDLER_THREADS; i++){
		pthread_create(&handler_threads[i], NULL, thread_handler, (void*)NULL);
	}

	while(run_server){
		printf("Accepting connections\n");
		int client_conn = accept_connection(server_sock);
		if(client_conn < 0){
			perror("accepting connection");
			continue;
		}
		queue_request(client_conn);
	}

}

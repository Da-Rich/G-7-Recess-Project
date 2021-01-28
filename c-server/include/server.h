#include <stdlib.h>
#include <stdio.h>
#include <unistd.h>
#include <fcntl.h>
#include <errno.h>
#include <string.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <signal.h>
#include <pthread.h>

#include "queue.h"
/* Constants Definitions */

#define SERVER_PORT 		3000
#define MAX_BUF_SIZE		4096 /* 4KB=unit page size*/
#define MAX_PENDING_REQUESTS	100
#define MAX_HANDLER_THREADS	50

typedef struct thread_args{
	int client_sock;
} thread_args_t;

extern queue_t* thread_queue;
extern pthread_mutex_t memory_locker;
extern pthread_cond_t thread_alert;

void queue_request(int);
void interrupt_handler(int);
void handle_client(int);
void *thread_handler(void*);
int accept_connection(int);
int queue_get();

#include <stdlib.h>

typedef struct queue{
	int size;
	int capacity;
	int front;
	int tail;
	int *objects;
} queue_t;

queue_t* queue_create(int);
int queue_is_empty(queue_t*);
int queue_pop(queue_t*);
void queue_push(queue_t*, int);


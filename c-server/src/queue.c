#include "queue.h"

queue_t* queue_create(int capacity){
	queue_t* q;
	q = (queue_t*)malloc(sizeof(queue_t));
	q->objects = (int*)malloc(sizeof(int)*capacity);
	q->size = 0;
	q->capacity = capacity;
	q->front = 0;
	q->tail = -1;

	return q;
}

int queue_is_empty(queue_t* q){
	return (q->size == 0);
}

int queue_pop(queue_t* q){
	if(q->size > 0){
		int tmp = q->objects[q->front];
		q->size--;
		q->front++;

		if(q->front == q->capacity){
			q->front = 0;
		}

		return tmp;
	}

	return -1;
}

void queue_push(queue_t* q, int object){
	if(q->size != q->capacity){
		q->size++;
		q->tail++;

		if(q->tail == q->capacity){
			q->tail = 0;
		}

		q->objects[q->tail] = object;
	}
}

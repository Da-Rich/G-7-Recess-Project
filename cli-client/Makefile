IDIR=include
CC=gcc
CFLAGS=-pthread -I$(IDIR)

ODIR=build
SRC=src

_DEPS = client.h
DEPS = $(patsubst %,$(IDIR)/%,$(_DEPS))

_OBJ = main.o client.o
OBJ = $(patsubst %,$(ODIR)/%,$(_OBJ))

$(ODIR)/%.o: $(SRC)/%.c $(DEPS)
	$(CC) -c -o $@ $< $(CFLAGS)

main: $(OBJ)
	$(CC) -o $@ $^ $(CFLAGS)

.PHONY: clean

clean:
	rm -f $(ODIR)/*.o *~ core $(IDIR)/*~ main


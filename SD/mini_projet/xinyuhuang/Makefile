CFLAGS := -g -Wall

all: test_biblio_liste test_biblio_arbre test_biblio_tabdyn test_biblio_hachage

biblio_liste.o: biblio_liste.c
	gcc $(CFLAGS) -c biblio_liste.c

biblio.o: biblio.c
	gcc $(CFLAGS) -c biblio.c

biblio_arbrelex.o: biblio_arbrelex.c
	gcc $(CFLAGS) -c biblio_arbrelex.c

parser.o: parser.c
	gcc $(CFLAGS) -c parser.c

main.o: main.c
	gcc $(CFLAGS) -c main.c

test_biblio_liste: biblio_liste.o biblio.o parser.o main.o
	gcc $(CFLAGS) -o test_biblio_liste main.o biblio_liste.o biblio.o parser.o

test_biblio_arbre:  biblio.o parser.o main.o biblio_arbrelex.o
	gcc $(CFLAGS) -o test_biblio_arbre main.o  biblio.o parser.o biblio_arbrelex.o

test_biblio_tabdyn: biblio.o parser.o main.o biblio_tabdyn.o
	gcc $(CFLAGS) -o test_biblio_tabdyn main.o  biblio.o parser.o biblio_tabdyn.o

test_biblio_hachage: biblio.o parser.o main.o biblio_hachage.o
	gcc $(CFLAGS) -o test_biblio_hachage main.o  biblio.o parser.o biblio_hachage.o

clean:
	rm -f *.o *~ $(PROGRAMS)

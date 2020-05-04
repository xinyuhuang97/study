#!/bin/bash
gcc -g -Wall -c test_time.c
make
gcc -g -Wall  -o test_time_liste test_time.o biblio_liste.o parser.o biblio.o
gcc -g -Wall  -o test_time_arbrelex test_time.o biblio_arbrelex.o parser.o biblio.o
gcc -g -Wall  -o test_time_tabdyn test_time.o biblio_tabdyn.o parser.o biblio.o
gcc -g -Wall  -o test_time_hachage test_time.o biblio_hachage.o parser.o biblio.o
echo test
if [ $1 == "artiste" ] || [ $1 == "titre" ] ||[ $1 == "numero" ]; then
  echo struct: liste methode: $1 #cle: $3
  time ./test_$1.sh liste $1
  echo test
  echo struct: arbrelex methode: $1 #cle: $3
  time ./test_$1.sh arbrelex $1
  echo test
  echo struct: tabdyn methode: artiste #cle: $3
  time ./test_$1.sh tabdyn $1
  echo test
  echo struct: hachage methode: $1 #cle: $3
  time ./test_$1.sh hachage $1
else
  echo "Erreur format : $0 <methode_de_recherche>"
  echo "Valeur possible : artiste, numero et titre"
fi

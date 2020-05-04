#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "parser.h"
#include "biblio.h"

//#define TAILLE_TITRE 20
//#define TAILLE_ARTISTE 40
//#include "biblio_liste.h"


 Biblio *charge_n_entrees(const char *nom_fichier, int n){
   FILE *f=fopen(nom_fichier,"r");
   Biblio *b=nouvelle_biblio();
   int num;
   int taille_buffer;//=20;
   while((n>0)&&(end_of_file(f)==0)){
      //int num=parse_string(f,buffer,taille_buffer,'\t');
      parse_int(f,&num);
      parse_char(f,'\t');
      char *titre = NULL;//malloc(sizeof(char)*TAILLE_TITRE);
      parse_string(f,&titre,&taille_buffer,'\t');
      char *artiste = NULL;//malloc(sizeof(char)*TAILLE_ARTISTE);;
      fgetc(f);
      parse_string(f,&artiste,&taille_buffer,'\n');
      fgetc(f);
      insere(b,num,titre,artiste);
      n--;
   }
  return b;
}

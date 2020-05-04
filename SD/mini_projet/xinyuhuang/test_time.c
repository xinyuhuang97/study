#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "biblio.h"
#include "parser.h"


int main(int argc, const char *argv[]){
  Biblio *new=charge_n_entrees("BiblioMusicale.txt" ,5);
  const char *argument = argv[1];
  const char *nom = argv[2];
  char *nom1=strdup(nom);
  /*if (argc != 2){
    printf("Erreur format : <struct> <methode_de_recherche> <argument_pour_methode>  \n");
    return 1;
  }*/
  if(strcmp(argument,"numero")==0){
    cherche_Morceau_par_numero(new, atoi(nom1));
  }
  else if(strcmp(argument,"titre")==0){
    cherche_Morceau_par_titre(new, nom1);
  }
  else if(strcmp(argument,"artiste")==0){
    cherche_Morceau_par_titre(new, nom1);
  }
  else{
    printf("Erreur format : <struct> <methode_de_recherche> <argument_pour_methode>\n" );
    return 1;
  }
  return 0;

}

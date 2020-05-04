#include <stdio.h>
#include <stdlib.h>
#include "biblio.h"
#include "parser.h"


void menu(){
  printf("Menu:\n");
  printf("0−Sortie\n");
  printf("1−Affichage\n");
  printf("2−Recherche morceaux uniques\n");

  printf("Votre choix : ");
}
int main(int argc, const char *argv[]){
  if (argc != 3){
    printf("Erreur format : %s <NomFichierBiblio . txt> <NbLigneALire>", argv[0]);
    return 1;
  }

  const char *nomfic = argv[1];
  int nlignes = atoi(argv[2]);

  printf("Lecture :\n");
  printf("hi\n" );
  Biblio *biblio = charge_n_entrees(nomfic , nlignes);
  printf("hi!\n" );
  int ch;
  do{
    menu();
    int lus = scanf("%d", &ch);
    if (lus == 0) {
      ch = 0;
    }
    switch(ch) {
      case 1:
      {
        printf("Affichage\n");
        affiche(biblio);
        break;
      }
      case 2:
      {
        Biblio *Bunique = uniques(biblio);
        affiche(Bunique);
        libere_biblio(Bunique);
        break;
      }
      default:
      {
        ch = 0;
        break;
      }
    }
  }while(ch!=0);

  libere_biblio(biblio);
  printf("Au revoir\n");
  /* ecrire les chansons dans und bibliotheque */
  return 0;
}

/*int main(){
  menu();
  Biblio *new=charge_n_entrees("BiblioMusicale.txt" ,5);
  //affiche(new);
  //affiche(new, '\n');

  //Test de la fonction "insere"

  Biblio *new_b=nouvelle_biblio();
  insere(new_b, 15, "Darlin' Danielle Don't", "Henry Lee Summer" );
  insere(new_b, 16, "Darlin", "Henry Lee Spring" );
  affiche(new_b,' ');


  //Test des fonctions de recherche
  affiche_morceau(cherche_Morceau_par_numero(new, 28), '\n');
  affiche_morceau(cherche_Morceau_par_titre(new,"Take A Bow"), '\n');
  affiche(cherche_Morceau_d_un_artiste(new, "Justin Bieber"), ' ' );
  Biblio *new_b=nouvelle_biblio();


  //Test de la fonction "rechercher_morceaux_non_doublon"
  //affiche(rechercher_morceaux_non_doublon(new),'\n');

  return 0;
}*/

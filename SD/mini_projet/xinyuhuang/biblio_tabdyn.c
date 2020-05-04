#include <stdio.h>
#include <stdlib.h>
#include "biblio.h"
#include <string.h>

typedef struct {
char *titre;
char *artiste;
int num;
} Morceau;

struct Biblio {
  int nE;/* Nombre de morceaux dans le tableau */
  int capacite;  /* Capacit’e du tableau */
  Morceau *T; /* Tableau de morceaux */
};

void affiche_char(char *ca){
  int i=0;
  while(ca[i]!='\0'){
    printf("%c",ca[i] );
    i++;
  }
}

void affiche_morceau(Morceau M, char separate){
  printf("%d%c",M.num, separate );
  affiche_char(M.titre);
  printf("%c", separate);
  affiche_char(M.artiste);
  printf("\n");
}

void affiche(Biblio *B){
  int i=0;
  while(i<B->nE){
    affiche_morceau(B->T[i], ' ');
    i++;
  }
}

Biblio *nouvelle_biblio(void){
  Biblio* B=(Biblio*)malloc(sizeof(Biblio));
  B->nE=0;
  B->capacite=5;
  B->T=(Morceau*)malloc(sizeof(Morceau)*5);
  return B;
}

void insere(Biblio *B, int num, char*titre, char *artiste){
  if(B->nE==B->capacite){
    //quand la tableau est remplie, on multiple la taille
    B->T=(Morceau*)realloc(B->T, 2*B->capacite*sizeof(Morceau));
    B->capacite=2*B->capacite;
  }
  B->T[B->nE].titre=strdup(titre);
  B->T[B->nE].artiste=strdup(artiste);
  B->T[B->nE].num=num;
  B->nE++;
}

void libere_biblio(Biblio *B){
  int i=0;
  while(i<B->nE){
    //Quand on n'est pas a la fin du tableau, on libere tous les champs et passe a case suivante
     free(B->T[i].titre);
     free(B->T[i].artiste);
     i++;
  }
  free(B->T);
  free(B);
}


Biblio* cherche_Morceau_par_numero(Biblio *B, int numero){
  //chercher en parcourant la tableau
  int i=0;
  Biblio* new=(Biblio*)malloc(sizeof(Biblio));
  while(i<B->nE){
    if(B->T[i].num==numero){
      insere(new, B->T[i].num, B->T[i].titre, B->T[i].artiste);
      return new;
    }
    i++;
  }
  return NULL;
}

Biblio* cherche_Morceau_par_titre(Biblio *B, char* titre){
  //chercher en parcourant la tableau
  int i=0;
  Biblio* new=(Biblio*)malloc(sizeof(Biblio));
  while(i<B->nE){
    if(strcmp(B->T[i].titre, titre)==0){
      insere(new, B->T[i].num, B->T[i].titre, B->T[i].artiste);
      return new;
    }
    i++;
  }
  return NULL;
}

Biblio* cherche_Morceau_d_un_artiste(Biblio *B, char* artiste){
  //chercher en parcourant la tableau
  int i=0;
  Biblio *new=nouvelle_biblio();
  while(i<B->nE){
    if(strcmp(B->T[i].artiste, artiste)==0){
      insere(new, B->T[i].num, strdup(B->T[i].titre), strdup(B->T[i].artiste));
    }
    i++;
  }
  return new;
}

Biblio* suppresion_morceau(Biblio *B, char *titre, char *artiste){
  //on chercher la case corrspond, on le remplace par la dernier case
  int i=0;
  while(i<B->nE){
    if((strcmp(B->T[i].titre, titre)==0)&&(strcmp(B->T[i].artiste, artiste)==0)) {
      B->T[i].num=B->T[B->nE-1].num;
      B->T[i].titre=strdup(B->T[B->nE-1].titre);
      B->T[i].artiste=strdup(B->T[B->nE-1].artiste);
      free(B->T[B->nE-1].titre);
      free(B->T[B->nE-1].artiste);
      B->nE--;
    }
    i++;
  }
  return B;
}

Biblio* uniques(Biblio *B){
  //on fait une double while pour proceder au fur et a meusure
  Biblio *new=nouvelle_biblio();
  int i=0;
  while(i<B->nE){
    Morceau m=B->T[i];
    int j=i+1;
    while(j<B->nE){
      if((strcmp(B->T[i].titre, m.titre)==0)&&(strcmp(B->T[i].artiste, m.artiste)==0)) {
        break;
      }
      j++;
    }
    insere(new, m.num, m.titre, m.artiste);
    i++;
  }
  return new;
}

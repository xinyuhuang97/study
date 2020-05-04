#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "biblio.h"


typedef struct CellMorceau{
  struct CellMorceau *suiv;
  int num;
  char *titre;
  char *artiste;
}CellMorceau;

struct Biblio{
  CellMorceau *L;
  int nE;
};

void affiche_char(char *ca){
  int i=0;
  while(ca[i]!='\0'){
    printf("%c",ca[i] );
    i++;
  }
}

void affiche_morceau(CellMorceau *M, char separate){
  printf("%d%c",M->num, separate );
  affiche_char(M->titre);
  printf("%c", separate);
  affiche_char(M->artiste);
  printf("\n");
}

void affiche(Biblio *B){
  CellMorceau *M = B->L;
  if(M==NULL){
    exit(0);
  }
  for (int i=0; i<B->nE; i++){
    printf("%d ",M->num);
    affiche_char(M->titre);
    printf(" ");
    affiche_char(M->artiste);
    printf("\n");
    M=M->suiv;
  }
  if(M!=NULL){
    printf("%d\n",M->num);
  }
}



Biblio *nouvelle_biblio(void){
 Biblio *b=(Biblio *)malloc(sizeof(Biblio));
 b->L=NULL;
 b->nE=0;
 return b;
}

void insere(Biblio *B, int num, char *titre, char *artiste){
  //insere en tete
  CellMorceau *new=(CellMorceau*)(malloc(sizeof(CellMorceau)));
  new->num=num;
  new->titre=strdup(titre);
  new->artiste=strdup(artiste);
  new->suiv=B->L;
  B->L=new;
  (B->nE)++;
}

void libere_morceau_rec(CellMorceau *m){
  //liberer tous les champs puis lui-meme
  if(m!=NULL){
    free(m->titre);
    free(m->artiste);
    libere_morceau_rec(m->suiv);
    free(m);
  }
}

void libere_biblio(Biblio* B){
  if(B->L!=NULL){
    libere_morceau_rec(B->L);
  }
  free(B);
}

Biblio* cherche_Morceau_par_numero( Biblio *B, int numero){
  //chercher en parcourant la liste
  CellMorceau* now=B->L;
  Biblio *new_b=nouvelle_biblio();
  while(now!=NULL){
    if( now->num==numero){
      insere(new_b, now->num, now->titre, now->artiste);
      return new_b;
    }
    now=now->suiv;
  }
  return NULL;
}

Biblio* cherche_Morceau_par_titre( Biblio *B, char* titre){
  //chercher en parcourant la liste
  CellMorceau* now=B->L;
  Biblio *new_b=nouvelle_biblio();
  while(now!=NULL){
    if(strcmp(titre,now->titre)==0){
      insere(new_b, now->num, now->titre, now->artiste);
      return new_b;
    }
    now=now->suiv;
  }
  return NULL;
}

Biblio* cherche_Morceau_d_un_artiste( Biblio *B, char* artiste){
  //chercher en parcourant la liste
  CellMorceau* now=B->L;
  Biblio *new_b=nouvelle_biblio();
  while(now!=NULL){
    if(strcmp(artiste,now->artiste)==0){
      insere(new_b, now->num, now->titre, now->artiste);
    }
    now=now->suiv;
  }
  return new_b;
}


 Biblio* suppresion_morceau( Biblio *B, char *titre, char *artiste){
   //on supprime le morceau en reliant son precedent et suivant
   CellMorceau *avant=B->L;
   CellMorceau *now=B->L;
   while(now!=NULL){
     if((strcmp(now->titre,titre)==0)&&(strcmp(now->artiste, artiste)==0)){
       if(avant==now){
         B->L=now->suiv;
         free(now->titre);
         free(now->artiste);
         free(now);
         return B;
       }
       else{
         avant->suiv=now->suiv;
         free(now->titre);
         free(now->artiste);
         free(now);
         return B;
       }
     }
     avant=now;
     now=now->suiv;
   }
 return B;
}

Biblio* uniques(Biblio *B){
  //on le fait par deux while qui procede au fur et a meusure la recherche
  Biblio *new=nouvelle_biblio();
  CellMorceau *tete1=B->L;
  int bool=0;
  int cpt=1;
  while(tete1!=NULL){
    if(tete1->suiv!=NULL){
      CellMorceau *tete2=tete1->suiv;
      while(tete2!=NULL){
        if((tete2->artiste==tete1->artiste)&&(tete2->titre==tete1->titre)){
          bool=1;
          break;
        }
        tete2=tete2->suiv;
      }
      if (bool==0){
        insere(new, tete1->num, tete1->titre, tete1->artiste);
      }
    }
    else{
      insere(new, tete1->num, tete1->titre, tete1->artiste);
    }
    bool=0;
    //printf("%d\n",cpt );
    cpt++;
    tete1=tete1->suiv;
  }
  return new;
}

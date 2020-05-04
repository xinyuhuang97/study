#include <stdio.h>
#include <stdlib.h>
#include "biblio.h"
#include <string.h>
#include <math.h>

typedef struct CellMorceau {
  struct CellMorceau *suiv;
  unsigned int cle;
  int num;
  char *titre;
  char *artiste;
}CellMorceau;

struct Biblio{
  int nE;
  int m;
  CellMorceau **T;
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
  int i=0;
  while(i<B->m){
    CellMorceau *now=B->T[i];
    while(now!=NULL){
      affiche_morceau(now, ' ');
      now=now->suiv;
    }
    i++;
  }
}

Biblio *nouvelle_biblio(void){
  Biblio* B=(Biblio*)malloc(sizeof(Biblio));
  B->nE=0;
  B->m=300;
  B->T=calloc(B->m, sizeof(CellMorceau *));;
  return B;
}

unsigned int fonction_cle(const char *artiste){
  //la foncion cle qui prend un string et retourne la somme de code ascci des caractere
  int i=0;
  unsigned int ascci=0;
  while(artiste[i]!='\0'){
    ascci+=(unsigned int)(artiste[i]);
    i++;
  }
  return ascci;
}

unsigned int fonction_hachage(unsigned int cle, int m){
  //la fonction hachage transforme la cle en un entirer plus petit que n
  float m_f=(float)m;
  float cle_f=(float)cle;
  float a=(sqrt(5)-1)/2;
  return (unsigned int)(m_f*(cle_f*a-(unsigned int)(cle_f*a))) ;
}

void insere(Biblio *B, int num, char *titre, char *artiste){
  //on cherche la case et on insere le chanson
  unsigned int cle=fonction_cle(artiste);
  unsigned int i=fonction_hachage(cle, B->m) ;
  //CellMorceau *a=B->T[i];
  CellMorceau *new=(CellMorceau*)malloc(sizeof(CellMorceau)) ;
  new->suiv=B->T[i];
  new->num=num;
  new->cle=cle;
  new->titre=strdup(titre);
  new->artiste=strdup(artiste);
  B->T[i]=new;
  B->nE++;
}

void libere_biblio(Biblio *B){
  int i=0;
  while(i<B->m){
    CellMorceau *now=B->T[i];
    if(now!=NULL){
      free(now->titre);
      free(now->artiste);
      CellMorceau *tmp=B->T[i];
      now=tmp->suiv;
      free(tmp);
    }
    i++;
  }
}

Biblio* uniques(Biblio *B){
  //on cherche si dans la meme case il y a des chansons identiques
  int i=0;
  Biblio *new=nouvelle_biblio();
  while(i<B->m){
    if(B->T[i]==NULL){
      i++;
      continue;
    }
    if(B->T[i]->suiv==NULL){
      insere(new,B->T[i]->num, B->T[i]->titre, B->T[i]->artiste);
      i++;
      continue;
    }
    CellMorceau *now=B->T[i]->suiv;
    CellMorceau *tete=B->T[i];
    while(tete!=NULL){
      int bool=0;
      while(now!=NULL){
        if((strcmp(now->titre,tete->titre)==0)&&(strcmp(now->artiste, tete->artiste)==0)){
            bool=1;
        }
        now=now->suiv;
      }
      if(bool==0){
        if(tete->titre!=NULL){
          insere(new, tete->num, tete->titre, tete->artiste);
        }
      }
      tete=tete->suiv;
      if(tete!=NULL){
        now=tete->suiv;
      }
    }
    i++;
  }
  return new;
}

Biblio* cherche_Morceau_par_numero(Biblio *B, int numero){
  //on parcour tous les chansons
  int i=0;
  Biblio* new=nouvelle_biblio();
  while(i<B->m){
    CellMorceau *tete=B->T[i];
    while(tete!=NULL){
      if(tete->num==numero){
        insere(new, tete->num, tete->titre, tete->artiste);
        return new;
      }
      tete=tete->suiv;
    }
    i++;
  }
  return NULL;
}

Biblio* cherche_Morceau_par_titre(Biblio *B, char* titre){
  //on parcour tous les chansons
  int i=0;
  Biblio* new=nouvelle_biblio();
  while(i<B->m){
    CellMorceau *tete=B->T[i];
    while(tete!=NULL){
      if(strcmp(tete->titre,titre)==0){
        insere(new, tete->num, tete->titre, tete->artiste);
        return new;
      }
      tete=tete->suiv;
    }
    i++;
  }
  return NULL;
}

Biblio* cherche_Morceau_d_un_artiste(Biblio *B, char* artiste){
  //on cherche la case corresponde et on cherche de-dans les chansons
  unsigned int cle=fonction_cle(artiste);
  unsigned int i=fonction_hachage(cle, B->m) ;
  CellMorceau* c=B->T[i];
  Biblio* new=nouvelle_biblio();
  while (c!=NULL){
    if(strcmp(c->artiste, artiste)==0){
      insere(new, c->num, c->titre, c->artiste);
    }
    c=c->suiv;
  }
  return new;
}

Biblio* suppresion_morceau(Biblio *B, char *titre, char *artiste){
  //comme pour les listes chainees
  int i=0;
  CellMorceau *avant=B->T[i];
  while(i<B->m){
    CellMorceau *now=B->T[i];
    while(now!=NULL){
      if((strcmp(now->titre,titre)==0)&&(strcmp(now->artiste, artiste)==0)){
        if(avant==now){
          B->T[i]=now->suiv;
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
    i++;
  }
  return B;
}

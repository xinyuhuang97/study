#include <stdio.h>
#include <stdlib.h>
#include "biblio.h"
#include <string.h>

typedef struct CellMorceau{
  struct CellMorceau *suiv;
  int num;
  char *titre;
  char *artiste;
}CellMorceau;

/* Cellule de l’arbre lexicographique */
typedef struct Noeud {
  struct Noeud *liste_car; /* liste des choix possibles de caract‘eres */
  struct Noeud *car_suiv; /* caract‘ere suivant dans la cha^ine */
  CellMorceau *liste_morceaux; /* liste des morceaux ayant le m^eme interpr‘ete */
  char car;
} Noeud;

struct Biblio{
  Noeud *A;
  int nE;
};

void affiche_char(char *ca){
  int i=0;
  while(ca[i]!='\0'){
    printf("%c",ca[i] );
    i++;
  }
}


Biblio *nouvelle_biblio(void){
 Biblio *b=(Biblio *)malloc(sizeof(Biblio));
 b->A=NULL;
 b->nE=0;
 return b;
}

void insere_rec(Noeud **A, int num, char *titre, char *artiste, int prof) {
    Noeud *n = *A;
    while (n && (n->car != artiste[prof])) {
        n = n->liste_car;
    }
    if (n == NULL) {
        n = malloc(sizeof(Noeud));
        n->car_suiv = NULL;
        n->liste_morceaux = NULL;
        n->car = artiste[prof];
        n->liste_car = *A;
        *A = n;
    }
    if (prof == strlen(artiste) - 1) {
        CellMorceau *c = malloc(sizeof(CellMorceau));
        c->num = num;
        c->titre = strdup(titre);
        c->artiste = strdup(artiste);
        c->suiv = n->liste_morceaux;
        n->liste_morceaux = c;
        return;
    }
    insere_rec(&(n->car_suiv), num, titre, artiste, prof + 1);
}

void insere(Biblio *B, int num, char *titre, char *artiste) {
    insere_rec(&(B->A), num, titre, artiste, 0);
    B->nE++;
}

Biblio *cherche_par_numero_rec(Noeud *A, int num, Biblio *L) {
    Noeud *n = A;
    while (n) {
        CellMorceau *c = n->liste_morceaux;
        while (c) {
            if (c->num == num) {
                insere(L, c->num, c->titre, c->artiste);
            }
            c = c->suiv;
        }
        cherche_par_numero_rec(n->car_suiv, num, L);
        n = n->liste_car;
    }
    return NULL;
}

Biblio *cherche_Morceau_par_numero(Biblio *B, int num) {
  Biblio *L = nouvelle_biblio();
  cherche_par_numero_rec(B->A, num, L);
  return L;
}

Biblio *cherche_par_titre_rec(Noeud *A, char *titre, Biblio *L) {
    Noeud *n = A;
    while (n) {
        CellMorceau *c = n->liste_morceaux;
        while (c) {
            if (strcmp(c->titre, titre) == 0) {
                insere(L, c->num, c->titre, c->artiste);
            }
            c = c->suiv;
        }
        cherche_par_titre_rec(n->car_suiv, titre, L);
        n = n->liste_car;
    }
    return NULL;
}

Biblio *cherche_Morceau_par_titre(Biblio *B, char *titre) {
  Biblio *L = nouvelle_biblio();
  cherche_par_titre_rec(B->A, titre, L);
  return L;
}

Biblio *cherche_Morceau_d_un_artiste(Biblio *B, char *artiste) {
  Biblio *L = nouvelle_biblio();
  Noeud *n = B->A;
  CellMorceau *c;
  int i;
  for (i = 0; i < strlen(artiste); i++) {
      while (n && (n->car != artiste[i])) {
          n = n->liste_car;
      }
      if (n == NULL) {
          return L;
      }
      if (i < strlen(artiste) - 1) {
          n = n->car_suiv;
      }
  }
  c = n->liste_morceaux;
  while (c) {
      if (strcmp(c->artiste, artiste) == 0) {
          insere(L, c->num, c->titre, c->artiste);
      }
      c = c->suiv;
  }
  return L;
}


void libere_Noeud(Noeud *n){
  if(n->liste_car!=NULL)
    libere_Noeud(n->liste_car);
  if(n->liste_morceaux!=NULL)
    free(n->liste_morceaux);
  if(n->car_suiv!=NULL)
    libere_Noeud(n->car_suiv);
  free(n);
}

void libere_biblio(Biblio *B){
  libere_Noeud(B->A);
  free(B);
}

void affiche_morceau(CellMorceau *M, char separate){
  printf("%d%c",M->num, separate );
  affiche_char(M->titre);
  printf("%c", separate);
  affiche_char(M->artiste);
  printf("\n");
}

void affiche_rec(Noeud *A, char separate) {
    Noeud *n = A;
    while (n) {
        CellMorceau *c = n->liste_morceaux;
        while (c) {
            affiche_morceau(c, separate);
            c = c->suiv;
        }
        affiche_rec(n->car_suiv, separate);
        n = n->liste_car;
    }
}

void affiche(Biblio *B) {
    affiche_rec(B->A,' ');
}

void uniques_rec(Noeud *A, Biblio *L) {
    Noeud *n = A;
    while (n) {
        CellMorceau *c = n->liste_morceaux;
        while (c) {
            //pour tous les morceau d'artiste, on cherche les non-doubles
            CellMorceau *tmp = c->suiv;
            while (tmp && (strcmp(c->titre, tmp->titre)||strcmp(c->artiste, tmp->artiste))) {
                tmp = tmp->suiv;
            }
            if (tmp == NULL) {
                insere(L, c->num, c->titre, c->artiste);
            }
            c = c->suiv;
        }
        uniques_rec(n->car_suiv, L);
        n = n->liste_car;
    }
}

Biblio *uniques(Biblio *B) {
    Biblio *L = nouvelle_biblio();
    uniques_rec(B->A, L);
    return L;
}



/*void affiche_noeud(Noeud *N, char separate){
  if(N==NULL){
    printf("%c\n",separate );;
  }
  else{
    if(N->liste_car!=NULL){
      while(N->liste_car!=NULL){
        Noeud *tete=N;
        if(N->car_suiv!=NULL){
          while(N->car_suiv!=NULL){
            printf("%c",tete->car);
            affiche_noeud(N->car_suiv, separate);
            N=N->car_suiv;
          }
        }
        else{
          printf("%c\n",tete->car  );
        }
        N=tete->liste_car;
        //affiche_noeud(N->liste_car, separate);
      }
    }
    else{
      Noeud *tete=N;
      if(N->car_suiv!=NULL){
        while(N->car_suiv!=NULL){
          printf("%c",tete->car);
          affiche_noeud(N->car_suiv, separate);
          N=N->car_suiv;
        }
      }
      else{
        printf("%c\n",tete->car );
      }
    }
  }
}

void affiche(Biblio *B, char separate){
  Noeud *n=B->A;
  affiche_noeud(n, separate);
  //printf("%c\n",n->car );
}*/
/*void affiche(Biblio *B, char separate){
  printf("%c\n",B->A->car-> );
  printf("%c\n",B->A->car_suiv->car );
  printf("%c\n",B->A->car_suiv->car_suiv->car );
  printf("%c\n",B->A->car_suiv->car_suiv->car_suiv->car );

}*/

/*
Biblio *uniques(Biblio *B){

}
*/
/*void insere(Biblio *B, int num, char *titre, char *artiste){
  //insere en tete
  //Noeud *n=(Noeud *)malloc(sizeof(Noeud));
  Noeud *n=B->A;
  int i=0;
  Noeud *car_suiv=NULL;
  Noeud *liste_car=NULL;
  while(artiste[i]!='\0'){
      if(n==NULL){
        n=malloc(sizeof(Noeud));
        n->liste_car=NULL;
        n->car_suiv=NULL;
        n->liste_morceaux=NULL;
        n->car=artiste[i];
      }
      Noeud *first_ca=n->liste_car;
      if(first_ca==NULL){
        liste_car=malloc(sizeof(Noeud));
        liste_car->car=artiste[i];
        //printf("%c\n", liste_car->car);
        liste_car->liste_car=NULL;
        liste_car->car_suiv=NULL;
        liste_car->liste_morceaux=NULL;
        car_suiv=liste_car;
        i++;
      }
      else{
        while(first_ca!=NULL){
          if(first_ca->car==artiste[i]){
            car_suiv=first_ca->car_suiv;
            i++;
            break;
          }
          if(first_ca->liste_car==NULL){
            Noeud *liste_car=malloc(sizeof(Noeud));
            //liste_car=malloc(sizeof(Noeud));
            liste_car->car=artiste[i];
            //printf("%c\n", liste_car->car);
            liste_car->liste_car=NULL;
            liste_car->car_suiv=NULL;
            liste_car->liste_morceaux=NULL;
            first_ca->liste_car=liste_car;
            car_suiv=liste_car->car_suiv;
            i++;
            break;
          }
          else{
            first_ca=first_ca->liste_car;
          }
        }
      }
      if(car_suiv==NULL){
        car_suiv=malloc(sizeof(Noeud));
        car_suiv->car=artiste[i];
        //printf("%c\n", car_suiv->car);
        car_suiv->liste_car=NULL;
        car_suiv->car_suiv=NULL;
        car_suiv->liste_morceaux=NULL;
        liste_car->car_suiv=car_suiv;
        n=car_suiv;
      }
      else{
        n=car_suiv;
        //printf("%c\n", car_suiv->car);
      }
  }
  CellMorceau *lm=n->liste_morceaux;
  CellMorceau *M=malloc(sizeof(CellMorceau));
  M->num=num;
  M->titre=titre;
  M->artiste=artiste;
  M->suiv=lm;
  CellMorceau *tmp=lm;
  //B->A=n;
  if(n!=NULL){
    printf("yes\n" );
    n->liste_morceaux=M;
    printf("hi\n" );
    n->liste_morceaux->suiv=tmp;
    printf("no\n" );
    (B->nE)++;
  }
  //printf("%c\n", B->A->car );
}*/

/*void insere(Biblio *B, int num, char *titre, char *artiste){
  Noeud *n=B->A;
  int i=0;
  while(artiste[i]!='\n'){

  }

}*/

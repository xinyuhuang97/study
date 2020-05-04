#include<stdio.h>
#include <unistd.h>
#include "Entete_Fonctions.h"

void trouve_zone_rec(int **M, int dim, int i, int j, int *taille, ListeCase *L){
  int init = test_liste_vide(L);
  int cl= M[i][j];
  if (init) {
      init_liste(L);
      *taille = 0;
  }
  M[i][j] = -M[i][j]-1 ;
  ajoute_en_tete(L, i, j);
  (*taille)++;

  if (j < dim - 1 && M[i][j + 1] == cl) {
      trouve_zone_rec(M, dim, i, j + 1, taille, L);
  }
  if (i < dim - 1 && M[i + 1][j] == cl) {
      trouve_zone_rec(M, dim, i + 1, j, taille, L);
  }
  if (j > 0 && M[i][j - 1] == cl) {
      trouve_zone_rec(M, dim, i, j - 1, taille, L);
  }
  if (i > 0 && M[i - 1][j] == cl) {
      trouve_zone_rec(M, dim, i - 1, j, taille, L);
  }
  if (init) {
      ListeCase c;
      for (c = *L; c; c = c->suiv) {
          M[c->i][c->j] = cl;
      }
  }
}
void trouve_zone_imp(int **M, int dim, int i, int j, int *taille, ListeCase *L){
  int init = test_liste_vide(L);
  int cl= M[i][j];
  if (init) {
      init_liste(L);
      *taille = 0;
  }
  M[i][j] = -M[i][j]-1 ;
  ajoute_en_tete(L, i, j);
  (*taille)++;
  ListeCase *new;
  init_liste(new);
  ajoute_en_tete(new, i, j);
  int cpt=1;
  while (cpt>0) {
    int i,j;
    cpt--;
    enleve_en_tete(new, &i, &j);
    if (j < dim - 1 && M[i][j + 1] == cl) {
        ajoute_en_tete(new, i, j+1);
        ajoute_en_tete(L, i, j+1);
        cpt++;
    }
    if (i < dim - 1 && M[i + 1][j] == cl) {
      ajoute_en_tete(new, i+1, j);
      ajoute_en_tete(L, i+1, j);
      cpt++;
    }
    if (j > 0 && M[i][j - 1] == cl) {
      ajoute_en_tete(new, i, j+1);
      ajoute_en_tete(L, i, j+1);
      cpt++;
    }
    if (i > 0 && M[i - 1][j] == cl) {
      ajoute_en_tete(new, i-1, j);
      ajoute_en_tete(L, i-1, j);
      cpt++;
    }
  }
  if (init) {
      ListeCase c;
      for (c = *L; c; c = c->suiv) {
          M[c->i][c->j] = cl;
      }
  }
  free(new);
}


int sequence_aleatoire_rec(int **M, Grille *G, int dim, int nbcl, int aff){
  int cpt=0;
  //srand(time(NULL));
  int taille;

  ListeCase L=NULL;
  trouve_zone_rec(M, dim, 0, 0, &taille, &L);
  int t1=taille;
  printf("%d\n",taille );

  if(taille<dim*dim){
    printf("test\n" );
    int cl=rand_cl(M, dim, nbcl);
    while(L!=NULL){

      int i, j;
      enleve_en_tete(&L, &i, &j);      M[i][j] = cl;

      if (aff) {
          Grille_attribue_couleur_case(G, i, j, cl);
      }
    }
    if (aff) {
        Grille_redessine_Grille(G);
    }
    printf("here\n" );
    trouve_zone_rec(M, dim, 0, 0, &taille, &L);
    printf("done\n" );
    int t2=taille;
    if(t1!=t2){
      aff=1;
    }
    //sleep(1);
    cpt=cpt+1+sequence_aleatoire_rec(M,G,dim,nbcl,aff);
  }
  printf("debut\n" );
  detruit_liste(&L);
  printf("fin\n" );
  return cpt;
}

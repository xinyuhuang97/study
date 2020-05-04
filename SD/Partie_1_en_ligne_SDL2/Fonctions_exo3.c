#include <stdio.h>
#include <stdlib.h>
#include "Entete_Fonctions.h"

typedef struct{
  int dim; /*dimension de la grille*/
  int nbcl; /*nombre de couleurs*/

  ListeCase Lzsg; /*Liste des cases de la zone Zsg*/
  ListeCase *B; /*Tableau de liste de cases de la bordure*/
  int ** App; /*Tableau a double entree des appartenances*/
}S_Zsg;

void init_Zsg(S_Zsg **Z, int dim, int nbcl){
  int i, j;
  (*Z)=malloc(sizeof(S_Zsg));
  (*Z)->dim=dim;
  (*Z)->nbcl=nbcl;
  (*Z)->Lzsg = NULL;
  (*Z)->B=malloc(nbcl*sizeof(ListeCase));
  (*Z)->App=malloc(dim*sizeof(int*));
  for (i = 0; i < nbcl; i++) {
      ((*Z)->B)[i] = NULL;
  }
  for(i=0; i<dim; i++){
    ((*Z)->App)[i]=malloc(dim*sizeof(int));
    for(j=0; j<dim; j++){
      ((*Z)->App)[i][j]=-2;
    }
  }
}

void ajoute_Zsg(S_Zsg *Z, int i, int j){
  //En O(1) car on l'a ajoute en tete
  ajoute_en_tete(&(Z->Lzsg), i, j);
  (Z->App)[i][j]=-1;
}

void ajoute_Bordure(S_Zsg *Z, int i, int j, int cl){
  ajoute_en_tete(&(Z->B)[cl], i, j);
  (Z->App)[i][j]=cl;
}

int appartient_Zsg(S_Zsg *Z, int i, int j){
  return (Z->App)[i][j]==-1;
}

int appartient_Bordure(S_Zsg *Z,  int i, int j, int cl){
  return (Z->App)[i][j]==cl;
}

/*int agrandit_Zsg(int **M, S_Zsg *Z, int cl, int k, int l){
  if(Z==NULL){
    init_Zsg(&Z, Z->dim, Z->nbcl);
  }
  int c=M[k][l];
  ajoute_Zsg(Z, k, l);
  int nbc=1;
  int cpt=1;
  while(cpt >0){
    int i,j;
    cpt--;
    enleve_en_tete(&(Z->Lzsg), &i, &j);
    if(i>0){
      if(M[i-1][j]==c){
        ajoute_Zsg(Z, i-1, j);
        Z->App[i-1][j]=-1;
        cpt++;
        nbc++;
      }
      else{
        ajoute_Bordure(Z, i-1, j, M[i-1][j]);
        Z->App[i-1][j]=M[i-1][j];
      }
    }
    if(j>0){
      if(M[i][j-1]==c){
        ajoute_Zsg(Z, i, j-1);
        Z->App[i][j-1]=-1;
        cpt++;
        nbc++;
      }
      else{
        ajoute_Bordure(Z, i, j-1, M[i][j-1]);
        Z->App[i][j-1]=M[i][j-1];
      }
    }
    if(i<(Z->dim)-1){
      if(M[i+1][j]==c){
        ajoute_Zsg(Z, i+1, j);
        Z->App[i+1][j]=-1;
        cpt++;
        nbc++;
      }
      else{
        ajoute_Bordure(Z, i+1, j, M[i+1][j]);
        Z->App[i+1][j]=M[i+1][j];
      }
    }
    if(j<(Z->dim)-1){
      if(M[i][j+1]==c){
        ajoute_Zsg(Z, i, j+1);
        Z->App[i][j+1]=-1;
        cpt++;
        nbc++;
      }
      else{
        ajoute_Bordure(Z, i, j+1, M[i][j+1]);
        Z->App[i][j+1]=M[i][j+1];
      }
    }
  }
  return nbc;
}*/


void detruit_Zsg(S_Zsg *Z) {
    int i;
    detruit_liste(&(Z->Lzsg));
    for (i = 0; i < Z->nbcl; i++) {
        detruit_liste(&((Z->B)[i]));
    }
    free(Z->B);
    for (i = 0; i < Z->dim; i++) {
        free((Z->App)[i]);
    }
    free(Z->App);
    free(Z);
}

int rand_cl(int **M, int dim, int nbcl) {
    /* Pas besoin de nbcl ? */
    int n, cl;
    do {
        n = rand() % (dim * dim);
        cl = M[n / dim][n % dim];
    } while (cl == M[0][0]);
    return cl;
}
int agrandit_Zsg(int **M, S_Zsg *Z, int cl, int k, int l) {
    int n = 0;
    ListeCase L = NULL;
    ajoute_en_tete(&L, k, l);
    while (L) {
        int i, j;
        enleve_en_tete(&L, &i, &j);
        if (i < 0 || i >= Z->dim || j < 0 || j >= Z->dim || appartient_Zsg(Z, i, j)) {
            continue;
        }
        if (M[i][j] != cl) {
            if (!appartient_Bordure(Z, i, j, M[i][j])) {
                ajoute_Bordure(Z, i, j, M[i][j]);
            }
            continue;
        }
        ajoute_Zsg(Z, i, j);
        n++;
        ajoute_en_tete(&L, i, j + 1);
        ajoute_en_tete(&L, i + 1, j);
        ajoute_en_tete(&L, i, j - 1);
        ajoute_en_tete(&L, i - 1, j);
    }
    return n;
}


int sequence_aleatoire_rapide(int **M, Grille *G, int dim, int nbcl, int aff) {
    int cpt = 0, taille = 0;
    S_Zsg *Z;
    init_Zsg(&Z, dim, nbcl);
    taille += agrandit_Zsg(M, Z, M[0][0], 0, 0);
    while (taille < dim * dim) {
        int cl = rand_cl(M, dim, nbcl);
        ListeCase c;
        for (c = Z->Lzsg; c; c = c->suiv) {
            M[c->i][c->j] = cl;
            if (aff) {
                Grille_attribue_couleur_case(G, c->i, c->j, cl);
            }
        }
        while ((Z->B)[cl]) {
            int i, j;
            enleve_en_tete(&((Z->B)[cl]), &i, &j);
            taille += agrandit_Zsg(M, Z, cl, i, j);
        }
        if (aff) {
            Grille_redessine_Grille(G);
        }
        cpt++;
    }
    detruit_Zsg(Z);
    return cpt;
}

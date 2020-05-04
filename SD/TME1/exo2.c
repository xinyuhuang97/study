#include<stdio.h>
#include<stdlib.h>
#include<time.h>
#define V 5
#define O 100000
int * allouetableau(int n){
  int *tab=(int*)malloc(sizeof(int)*n);
  return tab;
}
void allouetableau_2(int **T, int n){
  int *tab=(int*)malloc(sizeof(int)*n);
  *T=tab;
}

int *remplir_tableau(int *t, int n){
  //int random_val=rand()%V;
  for(int i=0;i<n;i++){
    t[i]=rand()%V;
  }
  return t;
}
void remplir_tableau_2(int **T, int n){
  for(int i=0;i<n;i++){
    (*T)[i]=rand()%V;
  }
}

void afficher_tableau(int *t, int n){
  for(int i=0;i<n;i++){
    printf("%d\n",t[i] );
  }
}
void afficher_tableau_2(int **T, int n){
  for(int i=0;i<n;i++){
    printf("%d\n",(*T)[i] );
  }
}

int algo(int *t, int n){
  int somme=0;
  for(int i=0;i<n;i++){
    for(int j=0;j<n;j++){
      somme+=(t[i]-t[j])*(t[i]-t[j]);
    }
  }
  return somme;
}

int algo_m_c(int *t, int n){
  int somme=0;
  int s_xixj=0;
  for(int i=0;i<n;i++){
    somme+=2*n*t[i]*t[i];
    s_xixj+=t[i];
  }
  somme=somme-2*(s_xixj*s_xixj);
  return somme;
}

int main(){
  srand(time(NULL));
  int *tab=allouetableau(O);
  remplir_tableau_2(&tab,O);
  //afficher_tableau(tab, 100);

  clock_t  temps_initial;
  clock_t  temps_final;
  double temps_cpu;
  temps_initial = clock();
  algo(tab,O);
  temps_final=clock();
  temps_cpu=((double)(temps_final-temps_initial))/CLOCKS_PER_SEC;
  printf("algo1-> nb:%d temps_cpu:%f\n",O, temps_cpu );

  temps_initial = clock();
  algo_m_c(tab,O);
  temps_final=clock();
  temps_cpu=((double)(temps_final-temps_initial))/CLOCKS_PER_SEC;
  printf("algo2-> nb:%d temps_cpu:%f\n",O, temps_cpu );
  //L'affichageTableau:
  //algo1-> nb:10000 temps_cpu:0.257700
  //algo2-> nb:10000 temps_cpu:0.000029
  free(tab);
  return 0;
}

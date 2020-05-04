#include<stdio.h>
#include<stdlib.h>
#include<time.h>
#define V 100000
#define O 1000

int** alloue_matrice(int m){
  int **tab=(int**)(malloc(sizeof *(tab)*m));
  for(int i=0;i<m;i++){
    tab[i]=(int*)(calloc(m,sizeof(int)*m));
  }
  return tab;
}

void afficher_matrice(int **tab, int m){
  for(int i=0;i<m;i++){
    for(int j=0;j<m;j++){
      printf("%d ",tab[i][j] );
    }
    printf("\n" );
  }
}
int** remplir_matrice(int **tab,int m){
  int **tab1=tab;
  int a=0;
  for(int i=0;i<m;i++){
    for(int j=0;j<m;j++){
      tab1[i][j]=rand()%V;
      //printf("%d %d %d\n",i,j,a);
      a++;
    }
  }
  return tab1;
}
int algo(int **tab, int m){
  for(int i=0;i<m;i++){
    for(int j=0;j<m;j++){
      int v=tab[i][j];
      for(int k=0;k<m;k++){
        for(int l=0;l<m;l++){
          if((tab[i][j]==tab[k][l])&&((i!=k)||(j!=l))){
            return 1;
          }
        }
      }
    }
  }
  return 0;
}

int algo_m_c(int **tab, int m){
  int *tab_2=(int *)(malloc(sizeof(int)*V));
  for(int i=0;i<m;i++){
    for(int j=0;j<m;j++){
      if(tab_2[tab[i][j]]!=1){
        tab_2[tab[i][j]]=1;
      }
      else{
        return 1;
      }
    }
  }
  return 0;
}

int main(){
  srand(time(NULL));
  int **tab=alloue_matrice(O);
  //afficher_matrice(tab,O);
  tab=remplir_matrice(tab,O);

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
  free(tab);
  return 0;
}

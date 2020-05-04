#include<stdio.h>
#include<stdlib.h>

const static int len = 10;

int main(void){
  int *tab;
  unsigned int i;
  tab=(int*)malloc(len*sizeof(int));

  for(i=len-1; i>=0; i--){
    tab[i]=i;
  }
  free(tab);
  return 0;
}
//Le programme est cense de creer une tableau qui contient les nombres de len-1 a 0
//En lancant ce programme, il apparait une segmentation fault
//Q1.3
//ON peut ajouter une contrainte (i>=0)&&(i<len)

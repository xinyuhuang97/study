#ifndef biblio_h
#define biblio_h

typedef struct Biblio Biblio;
typedef struct CellMorceau CellMorceau;
typedef struct Noeud Noeud;

Biblio *nouvelle_biblio(void);
Biblio *charge_n_entrees(const char *nom_fichier ,int n);
void libere_biblio(Biblio *B);

void insere(Biblio *B, int num, char *titre, char *artiste);
void affiche(Biblio *B);
void affiche_rec(Noeud *A, char separate);
Biblio *uniques(Biblio *B);
void uniques_rec(Noeud *A, Biblio *L);

Biblio* cherche_Morceau_par_numero(Biblio *B, int numero);
Biblio* cherche_Morceau_par_titre(Biblio *B, char* titre);
Biblio* cherche_Morceau_d_un_artiste(Biblio *B, char* artiste);
Biblio* suppresion_morceau(Biblio *B, char *titre, char *artiste);

#endif /* biblio_h */

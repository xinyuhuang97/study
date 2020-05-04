create table Ville(
  nom varchar(20),
  polulation number(100000000),
  pays varchar(20),
  constraint fkpays foreign ley(pays references pays(nom)) on delete cascade
);
create table pays(
  nom varchar(20) is not NULL,
  capitale varchar(20),
  primary key(nom)
);

INSERT INTO Ville(nom, polulation) VALUES('Paris', 3000000);
INSERT INTO Pays VALUES('France', 'Paris');
update Ville set pays='France' where nom='Paris';

drop table Ville cascade constraints;
drop table Pays cascade constraints;

==Mise a jour de tables==
===Insertions===
1-
insert into Employe(NumSS, prenomE) values (12456, 'Alain');
2-
insert into employe values(21456,'LARS', 'Anna','paris', '25-08-1975');
3-
insert into projet values (78143,'ORCA',21456,'paris',250000) ;
4-
insert into grille_sal values ('Responsable', 80000);

insert into grille_sal values ('Développeur',45000);

insert into grille_sal values ('Technicien',35000) ;

5-
/* Embauche(
			NumSS	number ,
			NumProj	number ,
			DateEmb	date default sysdate NOT NULL,
			Profil varchar2(20) NOT NULL)
*/

insert into Embauche values (12456,78143,'01-04-2014','testeur');


'testeur' n'existe pas dans la table Grille_sal (pas de profil 'testeur') cette instruction sera rejetée

//-----------------------------------------------------------
//TD8
//Xinyu HUANG 3803966 L2 G5 mono info
//---------
/*C1-C3*/
create domain cinq_chiffre as numeric(5,0);
create domain vingt_cara as varchar(20) check(value>=10000);
create domain ville_fr as varchar(9) check (value in ('Paris', 'Lyon', 'Marseille'));
create table if not exists EMPLOYE (
  NumSS cinq_chiffre ,
  NomE vingt_cara ,
  PrenomE vingt_cara ,
  /*C11.1*/
  NumChef cinq_chiffre,
  foreign key (NumChef) references EMPLOYE(NumSS),
  villeE ville_fr,
  DateNaiss time,
  /*C4*/
  DateEnreg time default current_timestamp,
  /*C5*/
  unique(NomE, PrenomE),
  /*C9 verifie localement*/
  constraint age_max check ( extract( year from current_timestamp)-extract(year from DateNaiss)<=70)
);

create table if not exists PROJET(
  NumProj numeric(7,0),
  NomProj vingt_cara ,
  /*C11.2*/
  /*C7*/
  ResProj cinq_chiffre NOT NULL,
  FOREIGN KEY (ResProj) REFERENCES EMPLOYE(NumSS) ,
  VilleP ville_fr,
  Budget numeric(10,2),
  /*C6*/
  constraint  NumProj_checm check (Numproj >=10000),
  /*C10 verifie globalement*/
  constraint Res_habite check (exists (select e.NumSS from EMPLOYE e where e.VilleE=VilleP and e.NumSS=ResProj))
);

create table if not exists GRILLE_SAL(
  Profil vingt_cara ,
  /*C8*/
  salaire numeric(7,2),
  constraint salaire_max check(salaire<=90000)
);

create table if not exists EMBAUCHE(
  /*C12*/
  Numss cinq_chiffre,
  NumProj numeric(7,0),
  DateEmb time,
  Profil vingt_cara ,
  foreign key (NumSS) references EMPLOYE(NumSS),
  foreign key (NumProj) references PROJET(Numproj),
  foreign key (Profil) references GRILLE_SAL(Profil)
);
//-----------------------------------------------------------
//-----------------------------------------------------------
//TP8
//---------
INSERT INTO employe VALUES('21456','LARS', 'Anna','paris', '1975-08-25', sysdate);

create domain cinq_chiffre as numeric(5,0);
create domain vingt_cara as varchar(20);
create domain ville_fr as varchar(9) check (value in ('Paris', 'Lyon', 'Marseille'));
create table if not exists EMPLOYE (
  NumSS cinq_chiffre ,
  NomE vingt_cara ,
  PrenomE vingt_cara ,
  villeE ville_fr,
  DateNaiss date,
  DateEnreg date default current_date,
  primary key(NumSS),
  unique(NomE, PrenomE),
  constraint age_max check ( extract( year from current_timestamp)-extract(year from DateNaiss)<=70)
);

create table if not exists PROJET(
  NumProj numeric(7,0),
  NomProj vingt_cara ,
  ResProj cinq_chiffre NOT NULL,
  FOREIGN KEY (ResProj) REFERENCES EMPLOYE(NumSS) ,
  VilleP ville_fr,
  Budget numeric(10,2),
  primary key(Numproj);
  constraint  NumProj_checm check (Numproj >=10000),
  constraint Res_habite check (exists (select e.NumSS from EMPLOYE e where e.VilleE=VilleP and e.NumSS=ResProj))
);

create table if not exists GRILLE_SAL(
  Profil vingt_cara ,
  salaire numeric(7,2),
  primary key(Profil),
  constraint salaire_max check(salaire<=90000)
);

create table if not exists EMBAUCHE(
  Numss cinq_chiffre,
  NumProj numeric(7,0),
  DateEmb date,
  Profil vingt_cara ,
  primary key(NumSS, NumProj),
  foreign key (NumSS) references EMPLOYE(NumSS),
  foreign key (NumProj) references PROJET(Numproj),
  foreign key (Profil) references GRILLE_SAL(Profil)
);

INSERT INTO employe VALUES('21456','LARS', 'Anna','paris', '1975-08-25', sysdate);
INSERT INTO PROJET VALUES('1234567', 'BIGPROJET', '21456', 'Paris', '1234');
INSERT INTO GRILLE_SAL VALUES('tall and handsome', '3000');
INSERT INTO EMBAUCHE VALUES('21456', '1234567', current_date, 'tall and handsome');
/*1*/
INSERT INTO employe VALUES('NULL','don', 'jack','Paris', '1975-08-25', sysdate);
/*2*/
INSERT INTO employe VALUES('12345','don', 'jack','Paris', '1900-08-25', sysdate);
/*3*/
INSERT INTO employe VALUES('123456','don', 'jack','Paris', '1975-08-25', sysdate);
/*4*/
INSERT INTO employe VALUES('12345','don', 'jack','Nante', '1975-08-25', sysdate);
/*5*/
INSERT INTO employe VALUES('20201','don', 'mike','Paris', '1999-08-25', sysdate);
INSERT INTO employe VALUES('20202','don', 'mike','Paris', '1975-08-25', sysdate);
/*6*/
INSERT INTO GRILLE_SAL VALUES('short and handsome', '3000000');
/*7*/
INSERT INTO PROJET VALUES('7654321', 'BIGPROJET', '20203', 'Paris', '1234');
/*8*/
INSERT INTO EMBAUCHE VALUES('21456', '1234566', current_date, 'tall and handsome');

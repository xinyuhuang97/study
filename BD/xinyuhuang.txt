//-----------------------------------------------------------
//TD7
//Xinyu HUANG 3803966 L2 G5 mono info
//-----------------------------------------------------------
//Q1 oui
//Q2 Parce que presque tous les astres ici se tourne autour du soleil sauf la lune et il est evident que la lune se tourne autour du terre, donc il suffit de preciser seulment l astre qui tourne
//Q3 Parce qu il existera deux entites qui possede la meme position un: lune et l autre astre qui est en position un et le champ idA2 et pos pour la soleil sera nul.
//Q4 Oui, car la cle du <observation> est ido qui ne depend pas au jour

//Q5
SELECT count(*) FROM CATEGORIE;
//Q6
select count(*)
from categorie
where EXISTS (select *
                    from astre
                    where astre.idc=categorie.idc);
//Q7
select min(rayon),max(rayon)
from astre;
//Q8
select round(avg(rayon)/1000, 2)||'milliers km'
from astre;
//Q9
//a)
select max(rayon)
from astre;
//b)
select astre.nom, astre.rayon
from astre
where rayon=(select max(rayon)
             from astre)
//Q10
select categorie.idc, count(*)
from categorie, astre
where categorie.idc=astre.idc
group by categorie.idc;
//Q11
select astre.ida, count(*)
from astre,tourneautour
where astre.ida=tourneautour.ida2
group by astre.ida;
//Q12
select (astre.nom,observation.dateobs,avg(observation.valobs))
from observation , astre
where astre.ida=observation.ida
group by(astre.ida,observation.dateobs);
//Q13
//a)
select categorie.idc, astre.rayon
from categorie, astre
where categorie.idc=astre.idc and
          astre.rayon=(select max(a2.rayon)
                           from astre a2
                           where a2.idc=categorie.idc )
group by categorie.idc
order by max(astre.rayon) ASC
//b)
select categorie.nom, astre.rayon
from categorie, astre
where categorie.idc=astre.idc and
          astre.rayon=(select max(a2.rayon)
                           from astre a2
                           where a2.idc=categorie.idc )
group by categorie.idc
order by max(astre.rayon) DESC
//c)
select categorie.idc, astre.nom, astre.rayon
from categorie, astre
where categorie.idc=astre.idc and
          astre.rayon=(select max(a2.rayon)
                           from astre a2
                           where a2.idc=categorie.idc )
group by categorie.idc
order by max(astre.rayon) DESC
//Q14
select categorie.idc
from categorie,astre
where categorie.idc=astre.idc
group by categorie.idc
having count(distinct astre.nom)>=2;
//Q15
select ob.dateobs, count(ob.ido),max(ob.valobs)
from observation ob
group by ob.dateobs
having max(ob.valobs)>=8000;
//Q16
select a.nom
from observation ob, astre a
where a.ida=ob.ida
group by ob.dateobs
having count(ob.ido)=2
//Q17
select a.nom
from astre a, tourneautour ta
where ta.ida2=a.ida
group by a.ida
having count(distinct ta.ida1)>=2
//Q18 a)
select ob.dateobs
from observation ob,astre a
where ob.ida=a.ida
group by ob.dateobs
having count(distinct a.ida)=(select count(distinct a2.ida)
                              from astre a2);
//Q18 b)
select ob.dateobs
from observation ob,astre a
where ob.ida=a.ida
group by ob.dateobs
having count(distinct a.ida)=(select count(a2.ida)
                              from astre a2, observation o2
                              where a2.ida=o2.ida);
//Q19 a)
select ca.idc
from categorie ca, astre a
where  ca.idc=a.idc
group by ca.idc
having count(distinct a.ida)=(select count(distinct a2.ida)
                              from observation ob,astre a2,categorie ca2
                              where ob.ida=a2.ida  and a2.idc=ca2.idc and ca.idc=ca2.idc
                              group by ca2.idc)
//Q19 b)
select ca.nom
from categorie ca, astre a
where  ca.idc=a.idc
group by ca.idc
having count(distinct a.ida)=(select count(distinct a2.ida)
                                  from observation ob,astre a2,categorie ca2
                                  where ob.ida=a2.ida  and a2.idc=ca2.idc and ca.idc=ca2.idc
                                  group by ca2.idc)

//-----------------------------------------------------------
//TME7
//-----------------------------------------------------------
//Q1
select count(*)
from athlete at
//Q2
select count(distinct at.aid)
from athlete at, RangIndividuel ri
where at.aid=ri.aid;
//Q3
select round(avg((to_date('06/02/2014','dd/mm/YYYY')-at.datenaissance)/365),1)
from athlete at
where at.codepays='FRA';
//Q4
select round(avg(ep.datefin-ep.datedebut)+1, 2), min(ep.datefin-ep.datedebut)+1, max(ep.datefin-ep.datedebut)+1
from epreuve ep
//Q5
select avg(count(*))
from athlete at
group by at.codepays
//Q6
select p.codepays,count(at.aid)
from pays p, athlete at
where at.codepays=p.codepays
group by p.codepays
order by count(at.aid) ASC ;
//Q7
select avg(count(at.aid))
from athlete at, pays p
where at.codepays=p.codepays
group by p.codepays;
//Q8
select eq.eqid,count(at.aid)
from equipe eq, athlete at, athletesequipe aeq
where eq.eqid=aeq.eqid and at.aid=aeq.aid
group by eq.eqid
order by count(at.aid) DESC;
//Q9
select ep.categorie, count(ep.epid)
from epreuve ep
group by ep.categorie;
//Q10
select sp.nomsp, count(ep.epid)
from sport sp, epreuve ep
where sp.sid=ep.sid
group by sp.nomsp
order by count(ep.epid) DESC
//Q11
select p.codepays,count(ri.epid), count(distinct at.aid)
from pays p, epreuve ep, RangIndividuel ri, athlete at
where at.codepays=p.codepays and ri.epid=ep.epid and ri.rang<=3 and at.aid=ri.aid
group by p.codepays
order by count(ri.epid);
//Q12
select p.codepays, s.sid, count(ri.epid), count(distinct at.aid)
from sport s, pays p, epreuve ep, RangIndividuel ri, athlete at
where ep.sid=s.sid and at.codepays=p.codepays and ri.epid=ep.epid and ri.rang<=3 and at.aid=ri.aid
group by p.codepays,s.sid
order by p.codepays, count(ri.epid) DESC;
//Q13
//1)
select eq.eqid
from equipe eq, athlete at, athletesequipe aeq
where eq.eqid=aeq.eqid and aeq.aid=at.aid
group by eq.eqid
having count(distinct at.aid)=10;
//2)
select eq.eqid
from equipe eq, athlete at, athletesequipe aeq
where eq.eqid=aeq.eqid and aeq.aid=at.aid
group by eq.eqid
having count(distinct at.aid)=(select max(count(distinct at2.aid))
                               from equipe eq2, athlete at2, athletesequipe aeq2
                               where eq2.eqid=aeq2.eqid and aeq2.aid=at2.aid
                              group by eq2.eqid);
//Q14
select sum(count(distinct ep.epid))
from epreuve ep, rangindividuel ri
where ep.epid=ri.epid
group by ep.epid
having count(distinct ri.aid)>=100;
//Q15
select distinct p.nomp
from epreuve ep, rangindividuel ri, athlete at, pays p
where ep.epid=ri.epid and ri.rang<=3 and ri.aid=at.aid and p.codepays=at.codepays
group by p.nomp
having count( ri.epid)>=20;
//Q16
select sp.sid
from sport sp, epreuve ep
where sp.sid=ep.sid
group by sp.sid
having count(distinct ep.categorie)=(select sum(count(distinct ep2.categorie))
                                      from epreuve ep2
                                      group by ep2.categorie)
//Q17
select p.nomp,count( distinct sp.sid)
from pays p, athlete at, RangIndividuel ri, epreuve ep, sport sp
where p.codepays=at.codepays and ri.epid=ep.epid and ri.aid=at.aid and ep.sid=sp.sid
group by p.nomp
having count( distinct sp.sid)=(select sum(count(distinct sp2.sid))
                                 from sport sp2, epreuve ep, athlete at2, rangindividuel ri2
                                 where ep.sid=sp2.sid and  ri2.epid=ep.epid and at2.aid=ri2.aid
                                 group by sp2.sid);
//Q18
select sp.nsp, count(jo.njo), sum(sp.somme)
from sponsorise sp, joueur jo
where sp.njo=jo.njo
group by sp.nsp
order by sum(sp.somme) DESC;
//Q19
select eqf.neq
from equipef eqf, match m
where eqf.neq=m.eq1
group by eqf.neq
having count(distinct m.st)>=3;
//Q20
select sp.nsp
from sponsorise sp, joueur jo, equipef eqf
where sp.njo=jo.njo and eqf.neq=jo.eq
group by sp.nsp
having count(eqf.neq)=count(distinct eqf.neq)
//Q21
select eqf1.neq, sum(d1.nbkm)
from equipef eqf1, match m1, match m2, dist d1
where eqf1.neq=m1.eq1 and eqf1.neq=m2.eq1 and m1.datem<m2.datem and d1.st1=m1.st and d1.st2=m2.st and (select count(m3.datem)
                                                                                                      from match m3
                                                                                        where m3.datem<m2.datem and m3.datem>m1.datem and m3.eq1=eqf1.neq)=0
group by eqf1.neq

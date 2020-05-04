<?php
include '../../TM/2/re_entete.php';
function lire_entetes($sock){
    $reponse='';
    $entetes=array();
    while(strlen($ligne=fgets($sock))>2){
      if(preg_match(RE_ENTETE, $ligne, $r)){
        $cle=$r[1];
        if(!isset($entetes[$cle])){
          $entetes[$cle]=array($r[2]);
        }else{
          $entetes[$cle][]=$r[2];
        }
      }else{
        $entetes[$cle][count($entete[$cle])-1].="\n".$ligne;
      }
    }return $entetes;
  }
?>

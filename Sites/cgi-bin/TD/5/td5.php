<?php

//Exo5.1
//Envoyer par requete_ressource
  function fournir_page($tab){
    list($status, $entetes, $page)=$tab;
    header($status);
    foreach ($entetes as $nom => $value) {
      foreach ($value as $valeur) {
        header("$nom:$valeur");
      }
    }
    echo $page;
  }

//Exo5.2
//define('RE_CONTENT_TYPE','/Cpmtemt-Type: famille\/(.*);/')
define('RE_CONTENT_TYPE', ",/([^\s;]+),")
  function type_cache($headers){
    if (isset($headers['Content-Type'])) AND preg_match(RE_CONTENT_TYPE, $HEADERS['CONTENT-TYPE'][0], $m){
      return $m[1];
    }
    return 'html';
  }

//Exo5.3
 function limiter_cache($headers){
   if(!isset($headers['Expires'])) return True;
   return (strtotime($headers['Expires'][0])>time());
 }
//Exo5.4
 function memoriser_cache($dir, $name, $entetes, $pages){
   $type=type_cache($entetes);
   if(($d1=fopen($dir.$nom.".http","w"))) AND (($d2=fopen($dir.$nom.".".$type,"w")))//$dir.$nom.".$type","w")
   AND fputs($d1, serialize($entetes)) AND fputs($d2, $page){
     fclose($d1);
     fclose($d2);
     return True;
   }
   return false;

 }
//Exo5.5
 function trouver_cache($dir, $name ,$file){
   
 }
 ?>

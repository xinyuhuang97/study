<?php
  function requete_pop($socket, $requete)
    if(fputs($socket,trim($requete."\r\n")))return false;
    $reponse=fgets($socket);
    return preg_match("/^\+OK/",$reponse) ? $reponse :false;
  }
  function connexion($ad_s, $id_u, $mot){
    $n_err='';
    $m_err='';
    $sock=fsockopen($ad_s, 110, $n_err, $m_err, 5);
    if($sock===False){
      echo 'Erreur[$n_err]:$m_err\n';
      //echo $n_err, $m_err;
    }
    else{
      $res=requete_pop($sock, "USER".$id_u);
      if($res){
        $res1=requete_pop($sock,"PASS".$mot);
          if($res1){
            return $socket;
          }else{
            return False;
          }
      }else{
      return False;
      }
    }
  }
  function deconnexion($sock, $requete){
    $res=requete_pop($sock,"QUIT".$requete);
    echo $res;
    @fclose($sock);
  }
  include '../../re_entete.php'
  /*function lire_entetes($sock){
    $reponse='';
    $entetes=array();
    do{
      $reponse=fgets($sock);
    while($reponse!=='\n'){
    }
  }*/
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

  function recuperation_message($sock, $n){
    $res=requete_pop($sock, 'RTER'.$n);
    $tab=lire_entetes($sock);
    do{
      $ligne=
    }while($ligne!='.');
  }
 ?>

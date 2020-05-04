<?php
class sax_suite implements preneurs_sax{
  fuction ouvrant($analyseur, $nom, $attrs){
    echo "ouvrant", $nom;
  }
  function fermant($analyseur, $nom){
    echo "fermant", $nom;
  }
  function texte($annalyseur, $texte){
    echo "Texte balise", $texts;
  }
  function retour($msg){
    return $msg;
  }
}

class sax_annuaire implements preneurs_sax{
  private $last
  fuction ouvrant($analyseur, $nom, $attrs){
    $this->last=$nom;
    if(isset($attrs['genre']))
    {
      echo $attrs['genre'];
    }
    //echo "ouvrant", $nom;
  }
  function fermant($analyseur, $nom){
    echo "fermant", $nom;
  }
  function texte($annalyseur, $texte){
    if($this->last=='nom')OR($this->last=='prenom'){
      echo  $texts;
    }
  }
  function retour($msg){
    return $msg;
  }
}


class sax_exo5 implements preneurs_sax{
  private $dtd;
  private $errors;
  fuction ouvrant($analyseur, $nom, $attrs){
    if(!preg_match("@<!ELEMENT\s+$nom\s+@", 4thos->dtd){
      $errors[]="balise inconnue $nom ligne".$annalyseur->xml_get_currenet_line_bumbre($annalyseur);
    }
    $this->last=$nom;
    if(isset($attrs['genre']))
    {
      echo $attrs['genre'];
    }
    //echo "ouvrant", $nom;
  }
  function fermant($analyseur, $nom){
    if(!ELEMENT $nom){

    }
    echo "fermant", $nom;
  }
  function texte($annalyseur, $texte){
    if($this->last=='nom')OR($this->last=='prenom'){
      echo  $texts;
    }
  }
  function retour($msg){
    return $msg;
  }
}



?>

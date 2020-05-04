<?php
$re='[A-Z].*';
$re="$re-$re:";
//$hi='.*';
//define ('RE_ENTETE',"/$re/");
define('RE_ENTETE', "/^([A-Z][A-Za-z]*(?:-[A-Z][A-Za-z]+)?):\s+(.*?)\s*$/");
//$i=file_get_contents('http://localhost/~xinyuhuang/cgi-bin/http_data.cgi');
//$j=file_get_contents('http://localhost/~xinyuhuang/megissage.php');
$k="Content-Type: text/html; charset=utf-8";
$l="K-K";
function en_tete($contenu){
if(preg_match(RE_ENTETE,$contenu)){
  return True;
}
else{
  return False;
}
}
/*function affichage($contenu){
if (en_tete($contenu)) echo "Returned true!\n";
else echo "Return false!\n";
}
affichage($i);
affichage($j);
affichage($k);
affichage($l);
*/ ?>

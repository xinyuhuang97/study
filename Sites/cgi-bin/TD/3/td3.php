
<?php
/*Cours:
$_SERVER['QUERY_STRING']
$_GET
$_POST
http://.........../?name=James&age=21
$_GET
name=>James
age=>21
*/
//exo3.1
include 'tableau_en_table.php';
function saisies_en_table($tab, $legend)
{
  $r=array();
  foreach ($tab as $key => $value) {
    $r[htmlspecialchars($key)]=htmlspecialchars($value);
  }
  return tableau_en_table($r,$legend);
}
//$legend='<a ref="http://fr.php.net/manual/en/reserved.variables.get.php/">  $_GET </a>:'.htmlspecialchars($_SERVER['QUERY_STRING']);
//echo saisies_en_table($_GET,$legend);
//exo3.2
//include 'saisies_en_table.php';
/*if (isset($_POST['mail'])AND isset($_POST['jour'])){
  echo saisies_en_table($_POST,"Informations");
}else{
  echo "<h1>TD3</h1>\n";
  echo "<form action='' method='post'><fieldset>\n",
      "<label for 'jour'>Jour:</label>",
      "<input id='jour' name='jour'/>\n",
      "<label for='mail'>Mail:<label>",
      "<textarea id='mail' name='mail' ></textarea>",
      "<input type='submit' value='Envoyer'>\n ",
      "</fieldset></form>\n";
}*/

//exo3.3
function saisie_fiable($tab,$index,$re='',$defaut=''){
  if(!isset($tab[$index])) return $defaut;
  if(!$re OR preg_match($re, $tab[$index])){
    return True;
  }else{
    return False;
  }
}
//exo3.4
//definition
define ('RE_JOUR',"/^([0-9]){4}[0-1][0-9][0-3][0-9]$/");
$re='[A-Z][a-z]*';
$re="$re(-$re)*";
$re="$re\.$re@\w+(\.(\w)+)+";
#$re="$re\.$re@\w+(\.(\w)+)*";
//define ('RE_MAIL',"/^($re)|[^<]*<($re)>$/");
define('RE_MAIL', "/.*/");
//debut_html
function debut_html($title){
  $debut="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
  'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>\n
  <html lang='en' xmlns:html='http://www.w3.org/1999/xhtml'>\n
  <head>\n<meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
  <title>$title</title>\n</head>";
  return $debut;
}
$mail=saisie_fiable($_POST,'mail',RE_MAIL);
$jour=saisie_fiable($_POST,'jour',RE_JOUR);
$titre="RDV";
/*echo "mail:".$mail;
echo "jour:".$jour;*/
/*if(($mail===True) AND($jour===True)){
  $body=saisies_en_table($_POST,"Informations");
  echo debut_html('Well done');
}else{
  if(($mail!=='') OR ($jour!=='')){
    $title="Erreur $title";
    $mail=htmlspecialchars($_POST['mail']);
    $jour=htmlspecialchars($_POST['jour']);
  }
  $body="<form action='' method='post'><fieldset>\n".
        "<label for='jour'>Jour:</label>".
        "<input id='jour' type='reset' name='jour' value='$jour'/>\n".
        "<label for ='mail'>Mail:</label>".
        "<textarea id='mail' name='mail'>$mail</textarea>\n".
        "<input type='submit' value='Envoyer'>\n".
        "</fieldset></form>\n";
  echo debut_html('Erreur:mail');
  $t=array('Jean-Marc.etu@etu.fr');
  echo saisie_fiable($t, 0, RE_MAIL);
}
echo $body;
*/


 ?>

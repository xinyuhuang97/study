<?php
include 'tableau_en_table.php';
function saisies_en_table($tab, $legend)
{
  $r=array();
  foreach ($tab as $key => $value) {
    $r[htmlspecialchars($key)]=htmlspecialchars($value);
  }
  return tableau_en_table($r,$legend);
}
if (isset(_GET['mail']) AND isset($_GET['jour'])){
 echo saisies_en_table($_POST, "Informations");
} else {
 echo "<form action='' method='get'><fieldset>\n",
     "<label for='jour'>Jour :</label>",
     "<input id='jour' name='jour' />\n",
     "<label for='mail'>Mail :</label>",
     "<textarea id='mail' name='mail'></textarea>\n",
     "<input type='submit' value='Envoyer'>\n",
     "</fieldset></form>\n";
}

function saisie_faible($tab, $string, $re='', $v=''){
  if(!isset($tab[$string])){
    return $v;
  }
  if((!$re OR preg_match($re))){
    return True;
  }
  return False;
}
define ('RE_JOUR',"/^([0-9]){4}[0-1][0-9][0-3][0-9]$/");
$re='[A-Z][a-z]*';
$re="$re(-$re)*";
$re="$re\.$re@\w+(\.(\w)+)+";
#$re="$re\.$re@\w+(\.(\w)+)*";
//define ('RE_MAIL',"/^($re)|[^<]*<($re)>$/");
define('RE_MAIL', "/.*/");

?>

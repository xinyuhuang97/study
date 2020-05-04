<?php
// 1.
function tableau_en_liste($tab, $type='ul')
{
    if (!$tab OR !is_array($tab))
        return '';
    if (count($tab) == 1)
        return array_shift($tab);
    return "<$type><li>" . join("</li>\n<li>", $tab) . "</li></$type>\n";
}

// 2.
function tableau_en_chaine_max($tab, $max=80){
  $chaine = "";
  foreach($tab as $v) {
    //+ 1 pour compter l'espace 
    if (strlen($chaine) + strlen($v) + 1 > $max) break;
    $chaine .= " $v";
  }
  return substr($chaine,1);
}
?>


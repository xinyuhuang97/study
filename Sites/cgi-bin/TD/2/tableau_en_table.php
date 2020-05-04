<?php
function tableau_en_table($tab,$caption)
{
  if(!$tab) return ' ';
  $chaine=' ';
  foreach($tab as $k=>$vl){
    $chaine.= "<tr><td> $k </td><td> $vl </td></tr>";#?
  }
  $th="<tr><th>KEY</th><th>VALUE</th></tr>";
  return "<table>\n <caption>$caption </caption>\n$th $chaine $th</table>\n";
}
?>

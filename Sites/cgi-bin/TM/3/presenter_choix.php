<?php
// Construit 3 boutons de soumissions permettant de naviguer et choisir
// dans un catalogue decrit par le tableau $catalogue de forme:
// array(article1 => prix1, article2 => prix2, ....)
// $n est le numero de page en cours de consultation

function presenter_choix($catalogue, $n, $hidden='')
{
  $att = " type='submit' name='item'";
  if (($n <= 0) OR ($n > count($catalogue))) $n = 1;
  if ($n > 1)
    $p = "<input$att value='" . ($n-1) . "' />\n";
  else $p = '';
  if ($n < count($catalogue))
    $s = "<input$att value='" . ($n+1) . "' />\n";
  else $s = '';
  $choix = '';
  foreach($catalogue as $nom => $prix) {
      if (!--$n) {
          $v = htmlspecialchars($nom, ENT_QUOTES);
          $choix = "<input$att value='$v' />$prix €";
          break;
      }
  }
  $corps = "<ul><li>$p</li>\n<li>$choix</li>\n<li>$s</li></ul>";
  return "<form action='' method='post'>\n$corps$hidden</form>";
}
?>

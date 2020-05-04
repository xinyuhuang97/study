<?php
/*function presenter_choix($tab, $nm, $string=''){
  if(($nm<=0) OR ($nm>count($tab))){
    $nm=1;
  }
  if($nm>1){
    $s="<li><input type='submit' name='item' value=".($nm-1)."></li>";
  }
  else{
    $s="";
  }
  if($nm<count($tab)){
    $i="<li><input type='submit' name='item' value=".($nm+1)."></li>";
  }
  else{
    $i="";
  }
  $choix="";
  //$st=$a."<ul><input type='submit' name='item' value=".($nm)."></ul>".$i;
  foreach ($tab as $ville => $prix) {
    if(!--$nm){
      $v=htmlspecialchars($ville, ENT_QUOTES);
      $choix="<li><input type='submit' name='item' value=".$v.">".$prix ."€</li>";
      break;
    }
  }
  $corps=$s.$choix.$i;
  return "<form action='' method='post'><ul>$corps</ul>$string</form>";
}*/
function presenter_choix($catalogue, $n, $hidden='', $vv=1)
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
          $choix = "<input$att value='$v' />".$prix*$vv." €";
          break;
      }
  }
  $corps = "<ul><li>$p</li>\n<li>$choix</li>\n<li>$s</li></ul>";
  return "<form action='' method='post'>\n$corps$hidden</form>";
}
 ?>

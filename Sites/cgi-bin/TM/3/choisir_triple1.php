<?php
  include '../2/debut_html.php';
  include 'presenter_choix1.php';
  include 'trouver_sous_index1.php';
  include 'destinations.php';
  function choisir_triple($t, $p, $v){
    $st=trouver_sous_index($t, $p);
    if(isset($st[$v])){
      return "Bon voyage pour$v ($st[$v])";
    }
    else{
      return presenter_choix($st, intval($v),"<input type='hidden' name='choix' value='$p'/>");
    }
  }
  $pays=(isset($_POST['choix'])) ?  $_POST['choix'] :0;
  $ville=(isset($_POST['item'])) ?  $_POST['item']:0;
  echo debut_html('Bon voyage'),
       "<body><div>",
       choisir_triple($destinations, $pays, $ville),
       "</div></body></html>";
 ?>

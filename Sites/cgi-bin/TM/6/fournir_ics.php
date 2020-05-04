<?php
  include 'envoi_ics.php';
  include 'fusionne_ics.php';

  $t="<form method='post' action='' enctype='multipart/form-data'>".
     "<fieldset><input type='file' name='ics1' /></fieldset>".
     "<fieldset><input type='file' name='ics2' /></fieldset>".
     "<fieldset><input type='submit' /></fieldset>";
  //echo $t;
  if((!isset($_FILES['ics1'])) or (!isset($_FILES['ics2']))){
    echo $t;
  }
  else{
    envoi_ics(fusionneics($_FILES['ics1']['tmp_name'], $_FILES['ics2']['tmp_name']), 'evenements_fusionnes.ics');
  }
?>

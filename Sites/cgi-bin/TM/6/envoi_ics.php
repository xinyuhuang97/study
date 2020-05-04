<?php
  function envoi_ics($tab, $n_file){
    if(empty($tab)){
      header("Content-Type: text/plain");
      echo $n_file;
    }
    else{
    header("Content-Type: text/calendar; charset=utf-8");
    header("Content-Transfer-Encoding: 8bit");
    header("Content-Disposition: inline; filename=$nom");

    foreach ($tab as $key => $value) {
        echo $value;
      }
    }
  }
  //envoi_ics(file('SACS Groupe 1 Licence.ics'), 'file.txt');
 ?>

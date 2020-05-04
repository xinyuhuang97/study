<?php

function fusionneics($ics1, $ics2){
  if(!is_array($ics1)){
    $t1=file($ics1);
  }
  else{
    $t1=$ics1;
  }
  if(!is_array($ics2)){
    $t2=file($ics2);
  }
  else{
    $t2=$ics2;
  }
  array_pop($t1);
  /*while(!preg_match("/BEGIN:(?!VCALENDAR)/", $t2[0])){
    $e1=array_pop($t2);
  }*/
  array_shift($t2);
  while(!preg_match("/BEGIN/", $t2[0])){
    array_shift($t2);
  }
  return array_merge($t1, $t2);
}
//var_dump(fusionneics('SACS Groupe 1 Licence.ics', 'SACS Groupe 2 Licence.ics'));
?>

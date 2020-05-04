<?php
function rev_dtend($t){
  foreach ($t as $key => $value) {
    $ics=$value[1].'ics';
    $agenda[]=is_readable($ics)? file_get_contents($ics):'';
  }
  for ($i = time(),$j=0; $j< 10; $j++,$i+=86400) {
    $ok = date('Ymd', $i);
    $date="/DTEND.*:".$ok."T.*/";
    foreach ($agenda as  $value) {
      if preg_match($date, $value){
        $ok=false;
        break;
      }
    }
    if($ok) return $ok;
  }
  return 0;
}
 ?>

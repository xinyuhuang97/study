<?php
define('RE_QUERY_STRING',"/(\w|\[|\])+=([^&]*)&?/");
function query_string($chaine){
  preg_match_all(RE_QUERY_STRING,$chaine,$out,PREG_SET_ORDER);
  print_r($out);
  $c='';
  $tab=array();
  foreach ($out as $tt=>$t){
    $tab[$t[1]]=$t[2];
    /*
    <?php
    $z = [
      'Drago' => 'blue',
      'Rex' => 'brown'
    ];
    array_push($z, 'black', 'purple');
    print_r($z);
    ?>
    */
  }
  return $tab;
}
print_r( query_string("h=89"));
print_r( query_string("h=89&a=33&b=51"));
?>

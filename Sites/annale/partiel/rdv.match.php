<?php
  include 'rdv.re.php';
  include 'mails.php';
  $ti=array(0, 1, 2, 3, 4, 5, 6);
  function rdv_match($ti, $tm){
    $new=array();
    foreach ($ti as $key => $value) {
      if ( (!isset($tm[$value])) OR (!preg_match(RE_MAIL_DOMAIN ,$tm[$value], $a))) {
        return array();
      }
      $new[]=$a;
    }
    return $new;
  }
  //var_dump(rdv_match($ti, $mails));
 ?>

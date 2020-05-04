<?php
  include 'fusionne_ics.php';
  include 'envoi_ics.php';
  function etes_vous_libre($f_ics, $date, $debut, $fin, $mail){
    $t=file($f_ics);
    while(isset($t[0])){
      $a=array();
      if(preg_replace('/\s+/', '',$t[0])=='BEGIN:VEVENT'){
        array_shift($t);
      }
      else if(preg_match('/^DTSTART.*:((\d){8})T((\d){6})$/',$t[0], $a)){
        if($a[1]==$date){
          $bool_date=1;
          $debut_2=$a[3];
          array_shift($t);
        }
        else{
          array_shift($t);
        }
      }
      else if(preg_match('/DTEND.*:(\d){8}T((\d){6})/',$t[0], $a)) {
          if ($bool_date==1){
            $fin_2=$a[2];
            if(($debut_2<=$debut) and($fin_2>=$debut)){
              //echo "false";
              return false;
            }
            if(($debut_2>=$debut)and($debut_2<=$fin)){
              //echo "false";
              return false;
            }
            else{
              array_shift($t);
            }
          }
          else{
            array_shift($t);
          }
      }
      else if (preg_replace('/\s+/', '',$t[0])==='END:VEVENT'){
        array_shift($t);
      }
      else{
        array_shift($t);
      }
    }
    $t_new=array();
    $t_new[]="BEGIN:VCALENDAR\n";
    $t_new[]="BEGIN:VEVENT\n";
    $t_new[]="DTSTART;TZID=Europe/Paris:".$date."T"."$debut\n";
    $t_new[]="DTEND;TZID=Europe/Paris:".$date."T"."$fin\n";
    $t_new[]="SUMMARY:rendez-vous\n";
    $t_new[]="DESCRIPTION:rendez-vous\n";
    $t_new[]="ATTENDEE:mailto:$mail\n";
    $t_new[]="END:VEVENT\n";
    $t_new[]="END:VCALENDAR\n";
    return fusionneics($f_ics, $t_new);
  }
  //echo (etes_vous_libre('SACS Groupe 1 Licence.ics','20180912','100000', '110000','rafael.ferro@ircam.fr'));
  /*if (etes_vous_libre('SACS Groupe 1 Licence.ics','20180912','100000', '110000','rafael.ferro@ircam.fr')!=false){
    envoi_ics(etes_vous_libre('SACS Groupe 1 Licence.ics','20180912','100000', '110000','rafael.ferro@ircam.fr'), 'file.txt');
  }
  else{
    echo "Pas libre";
  }*/
 ?>

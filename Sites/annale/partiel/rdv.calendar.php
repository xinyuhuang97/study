<?php
function rdv_calendar($nb, $mail, $t){
  $ca="BEGIN:VCALENDAR\nVERSION:2\nBEGIN:VEVENT\n";
  $ca.="DESCRIPTION:RDV$mail\n";
  foreach ($t as $key => $value) {
    $ca.="ATTENDEE:MAILTO:$value[0]";
  }
  $ca="DTSTART;TZID=Europe/Paris:".$nb."T100000\n".
      "DTEND;TZID=Europe/Paris:".$nb."T120000\n".
      "END:VEVENT\nEND:VCALENDAR";
  return $ca;
}
 ?>

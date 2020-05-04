<?php
function rdv_rfc822($nb, $mail, $t){
  $a="Subjet: RDV avec $t".
    "Date: $nb".
    "From: $t".
    "Mime-Version: 1.0".
    "Content-Type: multipart/mixed; boundary=\"PHOTO\"\n".
    "\n--PHOTO\n".
    "Content-Type: text/plain\n".
    "Ci-joint l'agenda de notre reunion,".
    "\n--PHOTO\n".
    "Content-Type: text/calendat; charset=utf-8\n\n".
    "Content-Disposition: attachement; filename=\"$mail-$date.ics\"\n".
    rdv_calendar($date, $from, $to).
    "\n--PHOTO\n";
  return $a;
}
 ?>

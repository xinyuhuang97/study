<?php
include('rdv.dtend.php');
include('rdv.sock.php');
include('rdv.rfc822.php');
include('rdv.status.php');
function rdv_smtp($to, $from)
{
    header('Content-Type: text/plain; charset=utf-8');
    $date = rdv_dtend($to);
    if (!$date) {
        echo "Pas de date.";
    } else {
        $domaines = rdv_sock($to);
        if (!is_array($domaines)) {
            header("HTTP/1.1 500 server SMTP unreachable");
            echo "Le serveur SMTP $domaines est injoignable.";
        } else {
            $agenda = rdv_rfc822($date, $from, $to);
            foreach($domaines as $d => $mails) {
                $sock = array_shift($mails);
                $req = array();
                $req[] = 'EHLO ' . $d;
                $req[] = "MAIL FROM: $from";
                foreach ($mails as $mail) $req[]= "RCPT TO: $mail" ;
                $req[] = "DATA\n" . $agenda . "\n.";
                $req[] = "QUIT";
                rdv_status($sock, $req);
            }
            echo "rdv le $date";
        }
    }
}
?>

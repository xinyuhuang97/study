<?php
function rdv_status($sock, $reqs)
{
    foreach($reqs as $req) {
        fputs($sock, $req . "\r\n");
        while ($reponse = fgets($sock)) {
            if (!preg_match("/^[123]\d\d(.)/", $reponse, $m))
                return false;
            if ($m[2] == ' ') break;
        }
    }
    return True;
}
?>

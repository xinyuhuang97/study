<?php
function rdv_sock ($to) {
    $domaines = array();
    foreach($to as $qui) {
        $d = $qui[2];
        if (isset($domaines[$d])) {
            $domaines[$d][] = $qui[0];
        } else {
            $sock = fsockopen($d, 2525, $e, $m, 1);
            if (!$sock)
                return $d;
            else $domaines[$d] = array($sock, $qui[0]);
        }
    }
    return $domaines;
}
?>

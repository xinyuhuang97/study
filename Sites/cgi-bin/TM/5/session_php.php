<?php
include '../2/debut_html.php';
include '../3/trouver_sous_index.php';
include '../3/presenter_choix.php';
include '../3/destinations.php';

define('COOKIE_PATH', 'COOKIE/');

function protege_cookie()
{
    if (!isset($_COOKIE['visite'])) {
        echo "not";
        $v = 0;
        $a = mt_rand();
        $f = COOKIE_PATH . md5($a . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        echo $f."f!!!!!!!!!\n";
        fopen($f, 'w')or die('Cannot open file:  '.$f);
        fputs($f, ($v+1) . "\n$a");
        fclose($f);
    } else {
        $f = $_COOKIE['visite'];
        if (is_readable($f)) {
            list($v, $a) = file($f);
            $f2 = COOKIE_PATH . md5($a . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        }
        else $f2 = '';
        if ($f != $f2) {
            echo $_COOKIE['visite'];
            echo "cookie1".$f."\n";
            echo "cookie2".$f2."\n";
            header('HTTP/1.1 403 Forbidden');
            die('Vol de cookie mon gaillard');
        }
    }
    if ($d = fopen($f, 'w')) {
        fputs($d, ($v+1) . "\n$a");
        fclose($d);
    }
    setcookie('visite', $f);
    return $v;
}

function choisir_triple($options, $pays, $n_ou_ville, $v=1)
{
    $desc = trouver_sous_index($options, $pays);
    if (isset($desc[$n_ou_ville])) {
        $prix = $desc[$n_ou_ville] * (($v > 1) ? ($v-1) : 1);
        return "Bon voyage pour $n_ou_ville ($prix €)";
    } else {
        $pays = htmlspecialchars($pays, ENT_QUOTES);
        $h = "<input type='hidden' name='choix' value='$pays' />\n";
        return presenter_choix($desc, intval($n_ou_ville), $h);
    }
}
$ville = isset($_POST['item']) ? $_POST['item'] : 0;
$choix = isset($_POST['choix']) ? $_POST['choix'] : 0;
$v = protege_cookie();
echo debut_html('Bon voyage'),
    "<body><div>\n",
    choisir_triple($destinations, $choix, $ville, $v),
    "</div></body></html>\n";
 ?>

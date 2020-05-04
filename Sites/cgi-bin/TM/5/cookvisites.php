<?php
include '../2/debut_html.php';
include '../3/trouver_sous_index.php';
include '../3/presenter_choix1.php';
include '../3/destinations.php';
//include 'protege_cookie.php';

/*function choisir_triple($options, $pays, $n_ou_ville,$v )
{
    $desc = trouver_sous_index($options, $pays);
    if (isset($desc[$n_ou_ville])) {
        $prix = $desc[$n_ou_ville]*$v;
        return "Bon voyage pour $n_ou_ville ($prix €)";
    } else {
        $pays = htmlspecialchars($pays, ENT_QUOTES);
        $h = "<input type='hidden' name='choix' value='$pays' />";
        return presenter_choix($desc, intval($n_ou_ville), $h, $v);
    }
}
// test
$ville = isset($_POST['item']) ? $_POST['item'] : 0;
$choix = isset($_POST['choix']) ? $_POST['choix'] : 0;
$v = isset($_COOKIE['visite'])? $_COOKIE['visite']+1 :1;
setcookie("visite", $v);
echo debut_html('Bon voyage');
//protege_cookie();
echo
    "<body><div>\n",
    choisir_triple($destinations, $choix, $ville, $v),
    "</div></body></html>\n";*/
function choisir_triple($options, $pays, $n_ou_ville, $v=1)
{
    $desc = trouver_sous_index($options, $pays);
    if (isset($desc[$n_ou_ville])) {
        $prix = $desc[$n_ou_ville] * (($v > 1) ? ($v-1) : 1);
        return "Bon voyage pour $n_ou_ville ($prix €)";
    } else {
        $pays = htmlspecialchars($pays, ENT_QUOTES);
        $h = "<input type='hidden' name='choix' value='$pays' />\n";
        return presenter_choix($desc, intval($n_ou_ville), $h, $v);
    }
}
$ville = isset($_POST['item']) ? $_POST['item'] : 0;
$choix = isset($_POST['choix']) ? $_POST['choix'] : 0;
$v = isset($_COOKIE['visite']) ? $_COOKIE['visite'] : 1;
setcookie('visite', $v+1);
echo debut_html('Bon voyage'),
    "<body><div>\n",
    choisir_triple($destinations, $choix, $ville, $v),
    "</div></body></html>\n";
 ?>

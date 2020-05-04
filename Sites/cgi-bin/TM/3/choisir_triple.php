<?php
include '../2/debut_html.php';
include 'trouver_sous_index.php';
include 'presenter_choix.php';
include 'destinations.php';

function choisir_triple($options, $pays, $n_ou_ville)
{
    $desc = trouver_sous_index($options, $pays);
    if (isset($desc[$n_ou_ville])) {
        $prix = $desc[$n_ou_ville];
        return "Bon voyage pour $n_ou_ville ($prix €)";
    } else {
        $pays = htmlspecialchars($pays, ENT_QUOTES);
        $h = "<input type='hidden' name='choix' value='$pays' />";
        return presenter_choix($desc, intval($n_ou_ville), $h);
    }
}
// test
$ville = isset($_POST['item']) ? $_POST['item'] : 0;
$choix = isset($_POST['choix']) ? $_POST['choix'] : 0;
echo debut_html('Bon voyage'),
    "<body><div>\n",
    choisir_triple($destinations, $choix, $ville),
    "</div></body></html>\n";
?>

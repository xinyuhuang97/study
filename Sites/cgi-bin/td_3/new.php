<?php
function saisies_par_choix($liste, $nom= 'choix', $type='checkbox')
{
    if (!$liste) return '';
    $res = '';
    if ($type == 'radio') {
        $c = "checked='checked' ";
        // pas besoin d'indicer car les boutions sont exclusifs les uns des autres.
        $name = $nom;
    } else {
        $c = '';
        // il suffit de mettre '[]' pour avoir la suite des entiers
        $name = $nom . '[]';
    }
    foreach($liste as $k => $nom) {
        $res .= "<li>" .
             "<input id='$nom$k' value='$k' name='$name' type='$type' $c/>" .
             "<label for='$nom$k'>$nom</label>" .
             "</li>\n";
        $c = '';
    }
    return "<fieldset><ol>\n$res</ol></fieldset>\n";
}
// test
$choix = array('Paris', 'Lyon', 'Marseille');
echo saisies_par_choix($choix);
?>

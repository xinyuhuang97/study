<?php
include 'destinations.php';

function tableau_en_select($options, $suite)
{
    $sel = '<option></option>';
    foreach ($options as $titre => $choix) {
        $groupes = '';
        foreach($choix as $groupe => $item) {
            $groupes .= "<option>$groupe</option>\n";
        }
        $sel .= "<optgroup label='$titre'>$groupes</optgroup>\n";
    }
    return "<form action='$suite' method='post'><fieldset>
        <label for='choix'>Faites votre choix</label>
        <select id='choix' name='choix'>$sel</select> 
        <input type='submit' />
        </fieldset></form>";
}
include '../2/debut_html.php';
echo debut_html('Destinations'),
    "<body>\n",
    tableau_en_select($destinations, 'choisir_triple.php'),
    "</body></html>\n";
?>

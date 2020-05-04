<?php
// Noter l'homonymie sur Aix (Aix-La-Chappelle en Allemagne et beaucoup d'autres en France)
// et la présence d'apostrophes dans certains noms.

/*$destinations =
    array(
        "Europe" => array(
            "France" => array("Aix" => 10, "Paris" => 20, "Les Sables d'Olonne" =>30),
            "Allemagne" => array("Aix" =>100,"Berlin" => 200, "Munich" =>210, "Dresde" =>150),
            "Italie" => array("Venise" => 500),
        ),
        "Asie" => array(
            "Japon" => array("Tokyo" => 1000, "Kyoto" => 900),
            "Vietnam" => array("Saïgon" => 870, "Hanoï" => 780, "Đà Nẵng" => 600)
        ),
        "Afrique" => array(
            "Côte d'Ivoire" =>  array("Yamoussoukro" => 650, "Abidjan" => 800),
            "Afrique du Sud" =>  array("Prétoria" => 950, "Le Cap" => 800)
        )
    );*/
include 'destinations.php';
function tableau_en_select($tab,$saisies){
  $body="<form action='' method=post><fieldset>".
        "<label for='choix'>choix</label>".
        "<select name='choix'>";
  foreach ($tab as $key => $value) {
    //foreach($value as $k=>$v){
    $body.="<optgroup label='$key'>";
    foreach($value as $k=>$v){
    $body.="<option >$k</option>";
    }
  }
  $body.="<input type='submit' value='Send'></fieldset></form>";
  echo $body;
}
//echo tableau_en_select($destinations, '');

//include 'tableau_en_table.php';
function trouver_sous_index($tab,$nom){
  $a=array();
  foreach ($tab as $continent => $array_p) {
      if(isset($array_p[$nom])) {
        echo $array_p[$nom]['Tokyo'];
        return $array_p[$nom];
      }
    //}
  }
  return $a;
}
 //trouver_sous_index($destinations,"Japon");

function presenter_choix($tab,$n,$defaut=''){
  if((n<1) OR (n>count($tab))) {
    $n=1;
  }
  echo "<form action ='' method=post>".
       "<ul><li><input type='submit' name='item' value='".($n-1)."'</li>".
       "<li><input type='submit' name='item' value='$n'</li>".$tab[$n].
       "<li><input type='submit' name='item' value='".($n+1)."'</li>".$defaut.
        "</ol></form>";

}
presenter_choix(trouver_sous_index($destinations,"Japon"),2);


function trouver_sous_index($t, $p, $v){
  $s_t=trouver_sous_index($t,$p);
  if(count($s_t)!=0){
    return "Bon voyage pour".$v."prix(".presenter_choix($s_t,$v);
  }
}

////////////////
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
include '../2/debut_html.php';

$ville = isset($_POST['item']) ? $_POST['item'] : 0;
$choix = isset($_POST['choix']) ? $_POST['choix'] : 0;
echo debut_html('Bon voyage'),
    "<body><div>\n",
    choisir_triple($destinations, $choix, $ville),
    "</div></body></html>\n";
?>

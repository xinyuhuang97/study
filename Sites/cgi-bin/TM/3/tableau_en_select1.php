<?php
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




//function tableau_en_select($tab/*, $suite*/){
  //$a="<form "./*action='$suite'*/ "method='post'><fieldset>".
    /* "<label for='choix'>Faites vos choix</label>".
     "<select id='choix' name='choix'>";
  foreach ($tab as $key => $arrays) {
    $a.="<optgroup label=$key>";
    foreach ($arrays as $pay=>$ville) {
      $a.="<option>$pay</option>";
    }
    $a.="</optgroup>";
  }
  $a.="<input type='submit'></fieldset></form>";
  return $a;
}
include '../2/debut_html.php';
echo debut_html("destinations"),
    "<body>",
    tableau_en_select($destinations),
    "</body>";*/
  include 'destinations.php';
  function tableau_en_select($tab,$saisies){
     $body="<form action='".$saisies."' method=post><fieldset>".
           "<label for='choix'>Faites votre choix</label>".
           "<select id='choix' name='choix'>";
     foreach ($tab as $key => $value) {
       //foreach($value as $k=>$v){
       $groupes='';
       foreach($value as $k=>$v){
         $groupes.="<option >$k</option>";
       }
       $body.="<optgroup label='$key'><option></option>$groupes</optgroup>";
     }
     $body.="</select><input type='submit' value='Send'></fieldset></form>";
     return $body;
   }
   include '../2/debut_html.php';
   echo debut_html("destinations"),
       "<body>",
       tableau_en_select($destinations,'choisir_triple1.php'),
       "</body></html>";






























 ?>

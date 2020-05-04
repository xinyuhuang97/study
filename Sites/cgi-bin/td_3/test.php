<?php
  //echo "<h1 'rdv'/h1>";
  /*if (isset($_POST['mail'])AND isset($_POST['jour'])){
    echo saisies_en_table($_POST,"Informations");
  }else{
    echo "<form action='' method='post'>\n",
        "<label for 'jour'>Jour:</label>",
        "<input id='jour' name='jour'/>\n",
        "<label for='mail'>Mail:<label>",
        "<textarea id='mail' name='mail'></textarea>",
        "<input type='submit' value='Envoyer'>\n ",
        "</fieldset></form>\n";
  }*/
  include 'tableau_en_table.php';
  function saisies_en_table($tab, $legend)
  {
    $r=array();
    foreach ($tab as $key => $value) {
      $r[htmlspecialchars($key)]=htmlspecialchars($value);
    }
    return tableau_en_table($r,$legend);
  }
  //$legend='<a ref="http://fr.php.net/manual/en/reserved.variables.get.php/"  $_GET </a>:'.htmlspecialchars($_SERVER['QUERY_STRING']);
  //echo saisies_en_table($_GET,$legend);
  //exo3.2
  //include 'saisies_en_table.php';
  if (isset($_POST['mail'])AND isset($_POST['jour'])){
    echo saisies_en_table($_POST,"Informations");
  }else{
    echo "<form action='' method='post'>\n",
        "<label for 'jour'>Jour:</label>",
        "<input id='jour' name='jour'/>\n",
        "<label for='mail'>Mail:<label>",
        "<textarea id='mail' name='mail'></textarea>",
        "<input type='submit' value='Envoyer'>\n ",
        "</fieldset></form>\n";
  }
?>

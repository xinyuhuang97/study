<?php

error_reporting(E_ALL);

include '../2/debut_html.php';
include '../../TD/2/tableau_en_table.php';
include 'requete_ressource.php';

$title = "Visualiser les en-têtes";
if (!isset( $_GET['url'])) {
    $body = "<form action=''><fieldset>
                <label for='url'>URL </label><input id='url' name='url' size='100'/>
            </fieldset></form>\n";
} else {
    $body = requete_ressource('HEAD', $_GET['url']);
    // 3e élement toujours vide avec HEAD, variable inutile après la 2e virgule
    list($status, $entetes,) = $body;
    $t = array_combine(array_map('htmlspecialchars', array_keys($entetes)),
                       array_map('htmlspecialchars', array_map('join', $entetes)));
    $body = "<div>Status: " . $status . "</div>" .
          tableau_en_table($t, "En-têtes reçus sur " . htmlspecialchars($_GET['url']));
}
echo debut_html($title), "<body>\n", $body, "</body></html>\n";

  /*include '../2/debut_html.php';
  include 'requete_ressource.php';
  if(!isset($_GET['url'])) {
    $body="<form name='tb' id='tb' action='' method='get'><fieldset>".
       "<label for='url'>URL</label>".
       "<input id='url name='url' size='200' /></fieldset></form>";
  }
  else{
    $t=requete_ressource('HEAD', $_GET['url']);
    $s='';
    foreach ($t[1] as $key => $value) {
      $s.="Content-Type: ".$key.$value;
    }
    echo $s;
  }

  echo  debut_html('hi')."<body>".$body."</body></html>";
*/

 ?>

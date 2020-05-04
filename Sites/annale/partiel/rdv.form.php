<?php
//include "mails.php";
//include "../../cgi-bin/TM/2/debut_html.php";
//include "rdv.match.php";
$ti=array(0, 1, 2, 3, 4, 5, 6);

  function rdv_form($l){
    $form="<form action='' method='post'><ul>";
    foreach ($l as $key => $value) {
      $form.="<li><input type='checkbox' id='qui$key' name='qui[]'>".
              "<label for='qui$key'>".htmlspecialchars($value)."</label></li>";
    }
    return $form."</ul><fieldset><input type='submit'></fieldset></form></body></html>";
  }
   //echo rdv_form(rdv_match($ti,$mails));
 ?>

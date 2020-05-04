<?php
  //phpinfo();
  //Q:Version php
  //R:PHP Version 7.3.8

  //Q:Date de fabrication
  //R:Aug 24 2019 19:37:19

  //Q:tableau le plus rempli dans "PHP variables"
  //R:C'est $_SERVER['HTTP_USER_AGENT']
  //Contenu:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.2 Safari/605.1.15
  function tableau_en_table($tab,$caption)
  {
    if(!$tab) return ' ';
    $chaine=' ';
    foreach($tab as $k=>$vl){
      $chaine.= "<tr><td> $k </td><td> $vl </td></tr>";#?
    }
    $th="<tr><th>KEY</th><th>VALUE</th></tr>";
    return "<table>\n <caption>$caption </caption>\n$th $chaine $th</table>\n";
  }
   echo tableau_en_table($_SERVER,"tableau");
 ?>

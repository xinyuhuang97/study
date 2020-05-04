<?php
include "mails.php";
include "../../cgi-bin/TM/2/debut_html.php";
include "rdv.match.php";
include "rdv.form.php";

/*$m=array();
if(isset($_POST['qui'])){
  $n=count($_POST['qui']);
  $a=array();
  $i=0;
  while($i<$n){
    $a[]=$i;
    $i++;
  }
  $choix=rdv_match($_POST['qui'], $mails );
}*/
$choix = (isset($_POST['qui']) AND is_array($_POST['qui'])) ?
       rdv_match($_POST['qui'], $mails) : '';
if (empty($choix)) {
    echo debut_html('RDV'),
        '<body><h1>',
        'RDV',
        "</h1>\n",
        rdv_form($mails),
        "\n</body></html>\n";
}else{
  rdv_smtp($mail[0], $choix);
}
/*$corps=rdv_form($mails);
$html=debut_html("hi").$corps."</body></html>";
echo $html;*/
?>

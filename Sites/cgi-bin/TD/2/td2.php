
<?php
#exo2
#1)
#Index               0      1       2
$Candidats = array("Bob","Alice","Chris");
#
#2)

echo "<h1>Liste avec for<\h1>\n<ul>\n";
     for($i=0;$i<count($Candidats);i++){
       echo "<li>", $Candidats[$i], "</li>\n";
     }
echo "</ul>"
#

#2.2
echo "<h1>Liste avec for<\h1>\n<ul>\n";
foreach($Candidats as $cand ){
  echo "<li",$Cand,"</li>\n";
}
echo "</ul>"

#2.3
echo "<h1>Liste avec for<\h1>\n<ul>\n";
while($Candidats){
  echo"<li>",array_shift($Candidats),"<li>\n"
}
echo "</ul>"


$Scores=array("Bob"=>300,
              "Aclie"=>130,
              "Chris"=>30);
assort($Scores);
echo "<h1></h1>\n<ol>\n";
foreach ($Scores as $key=>$value){
  echo "<li>",$key,":",$valeu,"<\li>\n";
}
echo "</ol>\n";

//Exo2.2
//1
function tableau_en_table($tab,$caption)
{
  if(!$tab) return ' ';
  $chaine=' ';
  foreache($tab as $k=>$vl){
    $chaine.="<tr><td>",$k,"</td><td>$vl</td></tr>";#?
  }
  $th="<tr><th>KEY</th>VALUE</th></tr>";
  return "<table>\n <caption>$caption </caption>\n.$th $chaine $th</table>\n";
}

function cherche_index_n ($tab,$n)
{
  foreache($tab as $k=>$vl){
    if(!--n) return $k;
  }
  return False;
}

//Exo2.4
//re_jour.php
define ('RE_JOUR',"/^([0-9]){4}[0-1][0-9][0-3][0-9]$/");

//Exo2.5
//re_heure.php
define ('RE_HEURE',"/^(2[0-4])|([0-1][0-9]) [0-5][0-9] [0-5][0-9]/");

//Exo2.6
//re_mail.php
$re='[A-Z][a-z]*';
$re="$re(-$re)*";
$re="$re\.$re@\w+(\.(\w)+)+";
#$re="$re\.$re@\w+(\.(\w)+)*";
define ('RE_MAIL',"/^($re)|[^<]*<($re)>$/");
?>

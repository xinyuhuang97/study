<?php
#Index               0      1       2
$Candidats = array("Bob","Alice","Chris");
echo "<h1>Liste avec for<\h1>\n<ul>\n";
     for($i=0;$i<count($Candidats);i++){
       echo "<li>", $Candidats[$i], "</li>"\n;
     }
echo "</ul>"
?>

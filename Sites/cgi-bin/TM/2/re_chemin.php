<?php
$re1="[^<>\"'&;(){}[]|]*\/";
$re2="[^<>\"'&;(){}[]|.]+.";
$re3="[^<>\"'&;(){}[]|.]+";
define('RE_CHEMIN',"/$re1*$re2$re3/");
function is_directory($path){
if(preg_match(RE_CHEMIN,$path)){
  echo "Path:$path\nC'est un chemin!\n";
}
}
is_directory("~/xinyuhuang/hi.php");
?>

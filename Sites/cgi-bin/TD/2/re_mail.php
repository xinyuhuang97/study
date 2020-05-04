<?php
$re = '[A-Z][a-z]*';
// Admettre un nom composé
$re = "$re(-$re)*";
# Ne pas écrire "/^$re[.]", PHP fait croire a une reference de tableau
# si on veut [.] mettre "/^" . $r . "[.].....
$re = "$re\.$re@\w+(\.\w+)*";
define('RE_MAIL', "/^($re)|([^<]*<($re)>)$/");

//$test = array(
//    "Anne@etu.upmc.fr",
//     "Anne-Marie.Manne-Ari@etu.upmc.fr",
//     "Anne.Manne-Arie@etu.upmc.fr",
//     "Anne.Manne@etu.upmc.fr",
//     "Anne-Marie.Manne@etu.upmc.fr",
//     "NIMPORTE quoi meme un saut de ligne
// <A.B@etu.upmc.fr>",
//     "Rien");
// 
// dans le cas de l'adresse etendue
// il y a 5 parentheses avant l'adresse effective
//header('Content-Type: text/plain');
// for ($i =0; $i<count($test); $i++) {
//    echo $test[$i], "\t\t";
//    if (preg_match(RE_MAIL, $test[$i], $m))
//        echo '"', $m[1] . '" et "' . $m[6], "\"\n";
//    else echo "echec\n";
// }
//?>

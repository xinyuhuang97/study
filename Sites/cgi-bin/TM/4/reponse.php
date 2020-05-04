<?php
//Exo1 Telnet et HTTP

//telnet localhost 80
//GET /

//R:Le type de document renvoye est du type html
//A la navigateur:localhost or /

//GET /~login HTTP/1.0


//Le code de retour est HTTP/1.1 301 Moved Permanently
//les liens actuels ou les enregistrements utilisant l'URL pour lesquels l'URL de réponse doit être modifiée.

//GET /~login HTTP/1.1
//Host: 127.0.0.1

//Le code de retour est HTTP/1.1 301 Moved Permanently
//Le fichier envoye est du type html
//Le navigateur execute telnet localhost 80 et puis il fait un Get pour obtenir un fichier de type html et l'execute dans le navigateur

//Pour le fichier contenant le contenu de telnet, il a plus de informations sur le processus de requete
//Pour l'autre contient les autre informations :bplist00?_WebMainResource?
//^WebResourceURL_WebResourceFrameName_WebResourceData_WebResourceMIMEType_ebResourceTextEncodingName_+http://localhost/~xinyuhuang/index_tme.htmlPO1

//Exo2
define('RE_URL',"/^.*\/\/([^:]*)?:(\d*)?\/(.*)?\?(.*)?$/");
if(preg_match(RE_URL,"https://www-licence.ufr-info-p6.jussieu.fr:8083/hi?123")){
  echo "yes";
}
//$m1="[A-Z][a-z]|[a-z][A-Z]";
//$m="($m1\d)|(\d$m1)";
/*$m="(?=.*\d)(?=.*[A-Za-z])";
echo $m;
//$m="$m(.+){3,}|(.+){3,}$m";
define('M',"/$m/");
if(preg_match(M,"5A")){
  echo "yes\n";
}*/
 ?>

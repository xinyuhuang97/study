<?php
/*include '../../TD/4/lire_entetes.php';
include 're_url.php';*/

/*function requete_ressource($req, $url) {
    if (!preg_match(RE_URL, $url, $r) OR (!$r[1]))
        return array(400, array(), "Mauvaise URL: $url");
    list(, $serveur, $port, $ressource,) = $r;
    if (!$port) $port = 80;
    $sock = fsockopen($serveur,$port);
    if (!$sock)
        return array(500 , array(), "$serveur:$port injoignable");
    else {
        $req .= " $url HTTP/1.1\r\nHost: $serveur\r\n\r\n";
        fputs($sock, $req);
        $status = fgets($sock);
        $entetes = lire_entetes($sock);
        $page='';
        while ( !feof($sock) ) $page .= fgets($sock);
        return array($status, $entetes, $page);
    }
}
var_dump(requete_ressource('GET', 'http://127.0.0.1/'))*/
include '../../TD/4/lire_entetes.php';
include 're_url.php';
  function requete_ressource($req, $url){
    preg_match(RE_URL, $url, $r);
    list(, $serveur, $port, $ressource,) = $r;
    if (!$port) $port = 80;
    $sock = fsockopen($serveur,$port);
    if (!$sock)
        return array(500 , array(), "$serveur:$port injoignable");
    else{
      $req.=" $url HTTP/1.1\r\n".
                "Host: $serveur\r\n\r\n";
      //echo $requete;
      fputs($sock,$req);
      $status=fgets($sock);
      $entetes=lire_entetes($sock);
      $page='';
      while(!feof($sock)){
        $page.=fgets($sock);
      }
      return array($status, $entetes,$page);
    }
  }
  //requete_ressource('GET',"localhost:80");
  //var_dump(requete_ressource('GET', 'http://127.0.0.1/'))
  /*
  GET / HTTP/1.1Host: localhost
  */
 ?>

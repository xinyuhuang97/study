<?php
//define('RE_URL',"/^.*\/\/([^:]*)?:(\d*)?\/(.*)?\?(.*)?$/");


define('RE_URL',"/^(?:.*:\/\/)?([^:\/]*)(?:\/)?(?::(\d+))?(?:\/)?(.*)(:?(.*))$/");
//                                  1                2              3      4

/*test positif
if (preg_match(RE_URL, "", $r)) echo var_dump($r);
if (preg_match(RE_URL, "/", $r)) var_dump($r);
if (preg_match(RE_URL, "foo.php?x=1", $r)) var_dump($r);
if (preg_match(RE_URL, "http://foo.net/", $r)) var_dump($r);
if (preg_match(RE_URL, "http://foo.net:8080/bar", $r)) var_dump($r);
*/
 ?>

<?php
//define('RE_MAIL_DOMAIN', "/[^<]*<(([^@]*)@([^>]*))>/");
define('RE_MAIL_DOMAIN', '/([^<]+)@([^>]+)/');

preg_match(RE_MAIL_DOMAIN, "moi<esj@su.fr>", $a);
/*echo $a[0],"\n";
echo $a[1],"\n";
echo $a[2],"\n";*/
//echo $a[3],"\n";
 ?>

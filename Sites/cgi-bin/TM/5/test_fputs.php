<?php
$a=1;
$b=2;
  $d=fopen('COOKIE/hi', 'w');
  fputs($d,"$a\n$b");
  fclose($d);
  $d=fopen('COOKIE/hi', 'w');
  fputs($d,"$b\n$a");
  fclose($d);
 ?>

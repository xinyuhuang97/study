<?php
$link = mysqli_connect('localhost', 'wordpress', '13002044333');
if (!$link) {
die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully';
mysqli_close($link);
?>

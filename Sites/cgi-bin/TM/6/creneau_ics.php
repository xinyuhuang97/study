<?php
  include 'etes_vous_libre.php';
  include '../../TD/3/saisie_fiable.php';
  include '../../TD/2/re_jour.php';
  include '../../TD/2/re_heure.php';
  include '../../TD/2/re_mail.php';

  $re_new='[a-z]+';
  $re_new="$re_new(-$re_new)*";
  $re_new="$re_new\.$re_new@\w+(\.\w+)*";
  define('RE_MAIL2', "/^($re_new)|([^<]*<($re_new)>)$/");

  //echo "hi";
  //echo $_FILES['ICS'];
  if(isset($_FILES['ICS'])){
    //echo $_FILES['ICS']['tmp_name'];
  }
  if(saisie_fiable($_POST, 'jour', RE_JOUR) and saisie_fiable($_POST, 'debut' , RE_HEURE) and saisie_fiable($_POST, 'fin', RE_HEURE) and saisie_fiable($_POST,'qui', RE_MAIL2 ) and isset($_FILES['ICS'])){
    if (etes_vous_libre($_FILES['ICS']['tmp_name'], $_POST['jour'] ,$_POST['debut'], $_POST['fin'], $_POST['qui'])==false){
      echo "Pas libre";
    }
    else{
      envoi_ics(etes_vous_libre($_FILES['ICS']['tmp_name'], $_POST['jour'] ,$_POST['debut'], $_POST['fin'], $_POST['qui']),'file.txt');
    }
  }
  else{
    include 'creneau.html';
  }
 ?>

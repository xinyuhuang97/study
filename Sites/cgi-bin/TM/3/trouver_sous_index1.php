<?php
function trouver_sous_index($tab, $pays){
    foreach ($tab as $continent) {
      if(isset($continent[$pays])){
        return $continent[$pays];
      }
    }
    return array();
  }

 ?>

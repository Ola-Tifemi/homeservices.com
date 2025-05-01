<?php

   
  function sanitize($eveilstring){
    $clean = strip_tags($eveilstring);
    $clean = addslashes($clean);
    $clean = htmlentities($clean);
    return $clean;  //or

    //$clean = (htmlentities(addslashes(strip_tags($eveilstring))));

}

?>
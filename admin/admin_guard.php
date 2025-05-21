<?php
if(!isset($_SESSION['adminonline'])){
    $_SESSION['adminerr'] = "You must be logged in to continue";
    header('location:login_form.php');
    exit;
}

?> 
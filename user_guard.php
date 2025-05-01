<?php
if(!isset($_SESSION['useronline'])){
    $_SESSION['errmsg'] = "You must  logged in to continue";
    header('location:login.php');
    exit;
}

?> 
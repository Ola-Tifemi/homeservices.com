<?php
if(!isset($_SESSION['vendonline'])){
    $_SESSION['errmsg'] = "You must be logged in to continue";
    header('location:vendlogin.php');
    exit;
}

?> $_SESSION['adminonline']
<?php
session_start();

require_once "../classes/User.php";
$user = new User;



if(isset($_POST['btnlogin'])){
    $username= $_POST['user'];
    $pass= $_POST['pass'];
    $check = $user->login($username,$pass);
    if($check){
        $_SESSION['useronline']= $check;
        header("location:../userpage.php");
        exit;
    }else{
        header("location:../login.php");exit;
    }
}else{
    $_SESSION['errmsg']='please complete the form';
    header('location:../index.php');exit;
}

?>
<?php
session_start();

require_once "../classes/Admin.php";
$user = new Admin;



if(isset($_POST['btnlogin'])){
    $username= $_POST['user'];
    $pass= $_POST['pass'];
    $check = $user-> admin_login($username,$pass);
    if($check){
        $_SESSION['adminonline']= $check;
        header("location:../index.php");
        exit;
    }else{
        $_SESSION['adminerr'] = 'Invalid username or password';
        header("location:../login_form.php");exit;
    }
}else{
    $_SESSION['adminerr']='please complete the form';
    header('location:../login_form.php');exit;
}

?>
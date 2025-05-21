<?php
session_start();

require_once "../classes/Vendor.php";
$user = new Vendor;



if(isset($_POST['btnloginv'])){
    $email= $_POST['user'];
    $pass= $_POST['pass'];
    $check = $user->login($email,$pass);

   if($email == '' || $pass == ''){
    $_SESSION['errmsg']='please complete the form';
    header('location:../vendlogin.php');exit;
   }
   
    if($check){
        $_SESSION['vendonline']= $check;
        header("location:../vendorpage.php");
        exit;
    }else{
        $_SESSION['errmsg']='Invalid credentials.. ';
        header('location:../vendlogin.php');exit;
    }
}else{
    $_SESSION['errmsg']='please complete the form';
    header('location:../index.php');exit;
}

?>


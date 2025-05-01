<?php

    session_start();
    require_once "../classes/utility.php";
    require_once "../classes/Vendor.php";

    $user = new Vendor;
    if(isset($_POST['regbtn'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        #retrive and sanitize data
        $fname= utility::sanitize($_POST['fullname']);
        $username =utility::sanitize($_POST['username']);
        $email= utility::sanitize($_POST['email']);
        $state= utility::sanitize($_POST['state']);
        $lg= utility::sanitize($_POST['lg']);
        $phone= utility::sanitize($_POST['number']);
        $address = utility::sanitize($_POST['address']);
        $bname = utility::sanitize($_POST['bname']);
        $cacid = utility::sanitize($_POST['cac']);
        $check = utility::sanitize($_POST['regcheck']) ? $_POST['regcheck'] : '';
        $pass1= $_POST['pwd1'];
        $pass2= $_POST['pwd2'];
            #do not sanitize password incase th euser may genuinely want to have slashes etc
        #validate the form
            if((trim($fname)=='')||(trim($username)=='')|| (trim($email)=='')||(trim($phone)=='') 
            || (trim($address)=='') ||(trim($bname)=='') ||(trim($cacid)=='')
            ||(trim($check)=='') ||(trim($pass1)=='')  ){
                $_SESSION['errmsgv']="All the fields are required";
                header('location:../vendregister.php');exit;

            }else{//the fields are complete
            if($pass1 != $pass2){
                $_SESSION['errmsgv']='The two passwords must match';
                header('location:../vendregister.php');exit();
            }elseif($user->username_exists($username)===true){
                $_SESSION['errmsgv']='this username has already been used please choose another username';
                header('location:../vendregister.php');exit;

            }
            elseif($user->cacid_exists($cacid)===true){
                $_SESSION['errmsgv']='CAC ID has already been used';
                header('location:../vendregister.php');exit;

            }elseif($user->email_exists($email)===true){
                $_SESSION['errmsgv']='this email has already been used';
                header('location:../vendregister.php');exit;

            }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                //filter var returns true or false
                $_SESSION['errmsgv']='please enter a valid email';
                header('location:../vendregister.php');exit;

            }
            else{#proceed
               $rsp= $user->register($fname,$username,$email,$state,$lg,$phone,$address,$pass1,$bname,$cacid);
               if($rsp){
                  $_SESSION['feedback']='An account has been created for you, please login';
                  header("location:../vendlogin.php");exit;
               }else{
                $_SESSION['errmsgv']='Registration failed try Again';
                header('location:../vendregister.php');exit;
               }
            }
        }
      
      
      
        



    }else{
        $_SESSION['errmsgv'] = "please complete the form";
        header("location:../vendregister.php");
        exit();
    }


?>
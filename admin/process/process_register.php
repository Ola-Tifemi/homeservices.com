<?php

    session_start();
    require_once "../classes/utility.php";
    require_once "../classes/User.php";

    $user = new User;
    if(isset($_POST['regbtn'])){
        #retrive and sanitize data
        $fname= utility::sanitize($_POST['fullname']);
        $username =utility::sanitize($_POST['username']);
        $email= utility::sanitize($_POST['email']);
        $phone= utility::sanitize($_POST['number']);
        $address = utility::sanitize($_POST['address']);
        $check = utility::sanitize($_POST['regcheck']) ? $_POST['regcheck'] : '';
        $pass1= $_POST['cpass'];
        $pass2= $_POST['cpass2'];
            #do not sanitize password incase th euser may genuinely want to have slashes etc
        #validate the form
            if((trim($fname)=='')||(trim($username)=='')|| (trim($email)=='')||(trim($phone)=='') || (trim($address)=='')|| (trim($check)=='') || (trim($pass1)=='') ){
                $_SESSION['errmsg']="All the fields are required";
                header('location:../register.php');exit;

            }else{//the fields are complete
            if($pass1 != $pass2){
                $_SESSION['errmsg']='The two passwords must match';
                header('location:../register.php');exit();
            }elseif($user->username_exists($username)===true){
                $_SESSION['errmsg']='this username has already been used please choose another username';
                header('location:../register.php');exit;

            }elseif($user->email_exists($email)===true){
                $_SESSION['errmsg']='this email has already been used';
                header('location:../register.php');exit;

            }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                //filter var returns true or false
                $_SESSION['errormsg']='please enter a valid email';
                header('location:../register.php');exit;

            }
            else{#proceed
               $rsp= $user->register($fname,$username,$email,$phone,$address,$check,$pass1);
               if($rsp){
                  $_SESSION['feedback']='An account has been created for you, please login';
                  header("location:../login.php");exit;
               }else{
                $_SESSION['errmsg']='Registration failed try Again';
                header('location:../register.php');exit;
               }
            }
        }
      
      
      
        



    }else{
        $_SESSION['errormsg'] = "please complete the form";
        header("location:../register.php");
        exit();
    }


?>
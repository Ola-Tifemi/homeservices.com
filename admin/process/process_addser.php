<?php
    session_start();

    require_once "../classes/Admin.php";
    $serv_type = new Admin;


    if(isset($_POST['btnadd'])){
        $service = $_POST['service'];
        $servicesdesc = $_POST['servicesdesc'];
        $check = isset($_POST['check']) ? $_POST['check'] : '';


        $name = $_FILES['dp']['name'];
        $type = $_FILES['dp']['type'];
        $tempname = $_FILES['dp']['tmp_name'];
        $erro = $_FILES['dp']['error'];
        $size = $_FILES['dp']['size'];
            // echo "<pre>";
            // print_r($_FILES);
            // echo "</pre>";
            // exit;
    }
        if($erro != 0){
            $_SESSION['errmsg'] = "Please select an image";
            header('location:../userpage.php');
            exit;
        }
        if($size >  2097152 ){
            $_SESSION['errmsg'] = "You can not upload more than 2mb";
            header('location:../userpage.php');
            exit;
        }
        $allowed =['jpg','jpeg','png']; 
        $user_ext = pathinfo($name,PATHINFO_EXTENSION);
        if(!in_array($user_ext,$allowed)){
            $_SESSION['errmsg'] = "You can only up .jpg, .jpeg, .png";
            header('location:../userpage.php');
            exit;
        }      
        $unique_name = "post_". uniqid(). '.'. $user_ext;
        
        $to = '../assets/images/'. $unique_name;

        if(empty($service)){
            $_SESSION['adminerr'] = 'Please Add New Service';
            header('location:../add_serv.php');
            exit;
        }
        if(empty($servicesdesc)){
            $_SESSION['adminerr'] = 'Please Add Service Description';
            header('location:../add_serv.php');
            exit;
        }
        if(empty($check)){
            $_SESSION['adminerr'] = 'Please Confirm Update';
            header('location:../add_serv.php');
            exit;
        }else{
            $response = $serv_type->add_all_services($tempname,$to,$unique_name,$service,$servicesdesc);
            if($response){
                $_SESSION['feedback']='Service Updated Succesfully';
                header("location:../index.php");exit;
             }else{
              $_SESSION['adminerr']='Registration failed try Again';
              header('location:../add_serv.php');exit;
             }           
        }
    
    
?>

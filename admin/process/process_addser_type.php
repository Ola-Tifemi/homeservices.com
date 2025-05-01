<?php
    session_start();

    require_once "../classes/Admin.php";
    $serv_type = new Admin;


    if(isset($_POST['btnupdate'])){
     
        $service = $_POST['service'];
        $servicetype = $_POST['cart'];
      
       
        if(empty($service)){
            $_SESSION['adminerr'] = 'Please Add New Service';
            header('location:../add_sub_serv.php.php');
            exit;
        }
        if(empty($servicetype)){
            $_SESSION['adminerr'] = 'Please Add Service Description';
            header('location:../add_sub_serv.php.php');
            exit;
        }
       else{
            $response = $serv_type->add_all_sub_service($service,$servicetype );
            if($response){
                $_SESSION['feedback']='Service Updated Succesfully';
                header("location:../index.php");exit;
             }else{
              $_SESSION['adminerr']='Registration failed try Again';
              header('location:../add_sub_serv.php.php');exit;
             }

           
        }
    
    }
?>

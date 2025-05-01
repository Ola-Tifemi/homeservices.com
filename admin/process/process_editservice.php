<?php
        session_start();
        require_once "../classes/Admin.php";

        $service = new Admin;
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        // exit;
        if(isset($_POST['editserv'])){
            // retrieve all the data including the id of the menu to update 
            $type_name =  $_POST['type_name'];
            $servicesdesc = $_POST['servicesdesc'];
            $type_id =  $_POST['type_id'];
            $check = isset($_POST['check']) ? $_POST['check'] : '';


            $name = $_FILES['dp']['name'];
            $type = $_FILES['dp']['type'];
            $tempname = $_FILES['dp']['tmp_name'];
            $erro = $_FILES['dp']['error'];
            $size = $_FILES['dp']['size'];
               
        
            if($erro != 0){
                $_SESSION['adminerr'] = "Please select an image";
                header('location:../add_serv.php');
                exit;
            }
            if($size >  2097152 ){
                $_SESSION['adminerr'] = "You can not upload more than 2mb";
                header('location:../add_serv.php');
                exit;
            }
            $allowed =['jpg','jpeg','png']; 
            $user_ext = pathinfo($name,PATHINFO_EXTENSION);
            if(!in_array($user_ext,$allowed)){
                $_SESSION['adminerr'] = "You can only up .jpg, .jpeg, .png";
                header('location:../add_serv.php');
                exit;
            }      
            $unique_name = "post_". uniqid(). '.'. $user_ext;
            
            $to = '../assets/images/'. $unique_name;

            
           

            if(empty($type_name)){
                $_SESSION['adminerr']='Please Input New Service Cartegoy';
                header("location:../edit_service.php?id=".$type_id); //passing with id incase there is error and id can be passed with it 
                exit;
            }

            $res = $service->update_profile($tempname,$to,$unique_name,$type_name,$type_id, $servicesdesc);

          
            if($res){
                $_SESSION['feedback']= 'Service Updated Successfully';
                header("location:../add_serv.php");
                exit;
            }else{
                // header("location:../../add_serv.php?id=".$type_id);
                // exit;
            }

        }else{
            $_SESSION['adminerr']='please complete the form';
        header("location:../login.php");
        exit;
        }

?>
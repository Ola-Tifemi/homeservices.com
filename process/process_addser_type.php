<?php
        session_start();
        require_once "../classes/Vendor.php";

            
            //             echo "<pre>";
            // print_r($_POST);
            // print_r($_FILES);
            // echo "</pre>";
            // exit;

        if(isset($_POST['btnadd'])){
            $serive_type = $_POST['servicetype_id'];
            $service_id = $_POST['service_id'];
            $service_desc = $_POST['about'];
            $id = $_POST['vendor_id'];
            $service_price = $_POST['service_price'];
            $negotiable = isset($_POST['negotiable']) ? $_POST['negotiable'] : 'non-negotiable';

            
        $name = $_FILES['upload']['name'];
        $type = $_FILES['upload']['type'];
        $tempname = $_FILES['upload']['tmp_name'];
        $erro = $_FILES['upload']['error'];
        $size = $_FILES['upload']['size'];

            // echo "<pre>";
            // print_r($_FILES);
            // echo "</pre>";
            // exit;
           
   
        if($erro != 0){
            $_SESSION['errmsg'] = "Please select an image";
            header('location:../vendorpage.php');
            exit;
        }
        if($size >  2097152 ){
            $_SESSION['errmsg'] = "You can not upload more than 2mb";
            header('location:../vendorpage.php');
            exit;
        }
        $allowed =['jpg','jpeg','png']; 
        $user_ext = pathinfo($name,PATHINFO_EXTENSION);
        if(!in_array($user_ext,$allowed)){
            $_SESSION['errmsg'] = "You can only up .jpg, .jpeg, .png";
            header('location:../vendorpage.php');
            exit;
        }      
        $unique_name = "post_". uniqid(). '.'. $user_ext;
        
        $to = '../assets/images/'. $unique_name;

        
        $post = new Vendor;
        $posts = $post->insert_post($tempname,$to,$unique_name,$id,$service_id, $serive_type,$service_desc,$service_price,$negotiable);
       
        if($posts){
            $_SESSION['feedback'] = "Serviced Updated Successfully";
            header('location:../vendorpage.php');
            exit;
        }
    }else{
                
                $_SESSION['errmsg'] = "Profile Picture Not Updated";
                header('location:../vendorpage.php');
                exit;
            }
            

           
       

?>
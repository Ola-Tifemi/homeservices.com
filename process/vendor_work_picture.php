<?php
    session_start();
        require_once "../classes/Vendor.php";
    if(isset($_POST['btnadd'])){
       $id = $_SESSION['vendonline'];


       //print_r($id);
           
       
        $name = $_FILES['dp']['name'];
        $type = $_FILES['dp']['type'];
        $tempname = $_FILES['dp']['tmp_name'];
        $erro = $_FILES['dp']['error'];
        $size = $_FILES['dp']['size'];
            echo "<pre>";
            print_r($_FILES);
            echo "</pre>";
            exit;
    }
        if($erro != 0){
            $_SESSION['errmsgv'] = "Please select an image";
            header('location:../userpage.php');
            exit;
        }
        if($size >  2097152 ){
            $_SESSION['errmsgv'] = "You can not upload more than 2mb";
            header('location:../userpage.php');
            exit;
        }
        $allowed =['jpg','jpeg','png']; 
        $user_ext = pathinfo($name,PATHINFO_EXTENSION);
        if(!in_array($user_ext,$allowed)){
            $_SESSION['errmsgv'] = "You can only up .jpg, .jpeg, .png";
            header('location:../userpage.php');
            exit;
        }      
        $unique_name = "post_". uniqid(). '.'. $user_ext;
        
        $to = '../assets/images/'. $unique_name;
        $post = new Vendor;
       
        $posts = $post->insert_post($tempname,$to,$unique_name,$id['cust_id']);
       
        if($posts){
            $_SESSION['feedback'] = "Profile Picture Updated";
            header('location:../userpage.php');
            exit;
        }
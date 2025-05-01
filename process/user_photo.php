<?php
    session_start();
        require_once "../classes/User.php";
    if(isset($_POST['upload'])){
       $id = $_SESSION['useronline'];


    //    print_r($id);
    //    exit;
            // print_r( $id['cust_id']);
            // exit;
       
        $name = $_FILES['dp']['name'];
        $type = $_FILES['dp']['type'];
        $tempname = $_FILES['dp']['tmp_name'];
        $erro = $_FILES['dp']['error'];
        $size = $_FILES['dp']['size'];

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
        $post = new User;
       
        $posts = $post->insert_post($tempname,$to,$unique_name,$id);
       
        if($posts){
            $_SESSION['feedback'] = "Profile Picture Updated";
            header('location:../userpage.php');
            exit;
        }else{
            $_SESSION['errmsgv'] = "please complete the form";
            header("location:../register.php");
            exit();
        }
    

       
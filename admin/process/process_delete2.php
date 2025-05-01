<?php
require_once "../classes/Admin.php";
$ser = new Admin;
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit;
    if(isset($_POST['btndelete'])){
            $id = $_POST['btndelete'];

        $res = $ser->delete_customer($id);
        if($res){
            $_SESSION['feedback'] = "Vendor Deleted successfully";
            header('location:../all_customers.php');
            exit;
        }else{
            $_SESSION['adminerr'] = "Something Went Wrong!!";
            header('location:../add_customers.php');
            exit;
        }
    }
?>
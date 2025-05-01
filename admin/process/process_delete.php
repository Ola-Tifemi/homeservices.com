<?php
require_once "../classes/Admin.php";
$ser = new Admin;
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
    if(isset($_POST['btndelete'])){
            $id = $_POST['btndelete'];

        $res = $ser->delete_vendor($id);
        if($res){
            $_SESSION['feedback'] = "Vendor Deleted successfully";
            header('location:../all_vendors.php');
            exit;
        }else{
            $_SESSION['adminerr'] = "Something Went Wrong!!";
            header('location:../add_vendors.php');
            exit;
        }
    }
?>
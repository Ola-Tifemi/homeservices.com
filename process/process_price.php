<?php
       
       session_start();
       require_once "../classes/Vendor.php";
        if(isset($_POST)){
            $service_desc = $_POST['desc'];
            $service_price =$_POST['price'];
            $id = $_POST['servicetype_id'];

                if(empty($service_price) ){
                    $_SESSION['errmsg'] = "Kindly edit New Price if needed!";
                    header('location:../vendorpage.php');
                    exit;
                }
                
                $price = new Vendor;
                $prices = $price->update_vendor_work($service_desc,$service_price,$id);
                if($prices){
                    $_SESSION['feedback'] = "Service Updated";
                header('location:../vendorpage.php');
                exit;
                }
        }


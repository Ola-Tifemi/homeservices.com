<?php
        session_start();
        require_once "classes/Vendor.php";
        $vendor = new Vendor;
        $vendor->logout();
        header('location:index.php');
        exit;
?>
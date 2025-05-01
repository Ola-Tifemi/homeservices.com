<?php
        session_start();
        require_once "classes/Admin.php";
        $user = new Admin;
        $user->logout();
        header('location:login_form.php');
        exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
    <title>Home Services.com</title>
  
    <style>
            div{
                background-color: white;
                font-family: "Signika", serif;} 
            .navbar-brand{
                font-size: large; 
                font-weight: 700;
            }
            #navbar ul li{
                padding-right: 55px;
                margin: 5px;
            }
            #navbar ul li a:hover{
                background-color: rgb(0, 132, 255) !important;
                border-radius: 20px !important; 
            }
            .book{
                background-color: rgb(0, 132, 255);
                border-radius: 20px;    
            }
            .bgimg{
                    
	          }
            .overlay{
              background-color:rgba(0,0,0,0.5); min-height:350px; width: 100%;min-height:350px; width: 100%;
               margin-top:50px; padding-bottom: 10px;
            }
            .footer{
              background-color: aquamarine; background-image: url(assets/images/dark-blue.webp); min-height: 500px; background-size:cover;
              width: 100%;
            }
            .wow{
              position:absolute;
			        top:520px; right:200px;
            }
            .wow3{
              position:absolute;
			        top:520px;  left:210px;
            }
            .navbar .buton a{
                text-decoration: none; color: white;
            }                
    </style>
</head>
<body>
    <div class="container-fluid">
      <!-- Navbar -->
        <div class="row">
            <div class="col-md p-0 m-0">
              <nav class="navbar navbar-expand-lg user-menu">
                <div class="container-fluid fixed-top ">
                    <div class="p-2 animate__animated animate__tada"> 
                                     <img src="assets/images/logo.png" alt="brand logo" width="70px">
                                    </div>
                  <span class="navbar-brand p-4" style="color:black; text-shadow: 2px 2px skyblue" >Home Services.com</span>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                   aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse px-4 align-left" id="navbarSupportedContent">
                  <?php
                        if((!isset($_SESSION['useronline'])) && (!isset($_SESSION['vendonline']))){
                    ?>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-left">
                      <li class="nav-item">
                        <a class="nav-link active px-4" aria-current="page" href="index.php">Home</a>
                      </li>
                 <li class="nav-item">
                        <a class="nav-link active px-4" aria-current="page" href="aboutus.php">About Us</a>
                      </li>
                 <li class="nav-item">
                        <a class="nav-link active px-4" aria-current="page" href="faq.php">FAQ</a>
                      </li> 
                  <li class="nav-item dropdown px-3 mx-3 ">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Register Now!
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="vendregister.php">Vendor Sign Up</a></li>
                          <li><a class="dropdown-item" href="vendlogin.php">Vendor Login</a></li>
                          <li><a class="dropdown-item" href="register.php">Customer Sign Up</a></li>
                          <li><a class="dropdown-item" href="login.php">Log In</a></li>
                        </ul>
                  </li>
                </ul>  
                    <?php 
                    } ?>                   
                  </div>
                 
                  <?php
                        if(isset($_SESSION['useronline'])){ ?>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                      aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>     
                    <div class="collapse navbar-collapse px-4 align-left" id="navbarSupportedContent">
                 
                        <ul class="navbar-nav ms-auto px-2 mb-2 mb-lg-0">
                        <li>
                          <a class="nav-link active" aria-current="page" href="userpage.php">Profile</a>
                        </li>
                        </ul>
                      <div class="dropdown user-menu px-3 me-3">
                        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="assets/images/<?php 
                echo $photo['file_name'];
            ?>" width="30" style="border-radius: 50%;"> Hi, <?php echo $check['cust_uniquerusername'];?>
                        </a>
                      
                        <ul class="dropdown-menu" style="border-radius: 0px;background-color:rgb(187, 200, 227);">
                          <li><a class="dropdown-item" href="userpage.php">Profile</a></li>
                          <li><a href="user_profile.php" class="dropdown-item" id="myButton">Add Profile Picture</a></li>
                          <li><a href="user_profileu.php" class="dropdown-item">Change Profile Picture</a></li>
                          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                      </div>
                    </div>
                      <?php }
                      ?>
         
                    <?php 
                      if (isset($_SESSION['vendonline'])){
                      ?>     
                      <div class="collapse navbar-collapse px-4 align-left" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="vendorpage.php">Dashboard</a>
                      </li>
                        </ul>
                      <div class="dropdown user-menu px-4">
                        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           Hi, <?php echo $check['vendor_brandname'];?>
                        </a>
                      
                        <ul class="dropdown-menu user-profile" style="border-radius: 0px;background-color:rgb(122, 130, 145);">
                          <li><a class="dropdown-item" href="vendorpage.php">Dashboard</a></li>
                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modal">Add Profile Picture</a></li>
                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modal2">Change Profile Picture</a></li>
                          <li><a class="dropdown-item" href="vlogout.php">Logout</a></li>
                        </ul>
                      </div>
                  </div>
                      <?php }
                      ?>         
                </div>
              </nav>                     
            </div>
        </div>
 
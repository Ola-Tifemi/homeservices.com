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
@keyframes backgroundAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
            }
        
@keyframes textAnimation {
                0% {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

.btn-outline-
            {
                transition: all 0.3s ease-in-out;
            }
            
            .btn-outline-primary:hover {
                background-color: #0d6efd;
                color: white;
                border-color: #0d6efd;
                transform: scale(1.05);
            }
.card:hover {
                transform: translateY(-10px);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            }
     body{
                margin: 0;
                padding: 0;
            }

            body{
                background-color: white;
                font-family: "Signika", serif;} 
.navbar-brand{
                font-size: large; 
                font-weight: 700;
            }
    .navbar {
                margin: 0 !important;
                top: 0;
                left: 0;
                right: 0;
                z-index: 1050;
                backdrop-filter: blur(8px);
            }
            #navbar ul li{
                padding-right: 55px;
                margin: 0px;
            }
.navbar-nav .nav-link:hover {
                color: #fff !important;
                background-color: #0d6efd;
                border-radius: 50%;
             }
    .nav-link {
                transition: all 0.3s ease;
            }
       .book{
                background-color: rgb(0, 132, 255);
                border-radius: 20px;    
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
            
            @media (max-width: 768px) {
            .col-md-6 {
                padding: 1rem;
            }
        
        }
        @media (max-width: 768px) {
    .footer-text {
        font-size: 0.9rem; 
    }
    .container-fluid.bg-primary {
        padding-top: 0rem;
        padding-bottom: 1rem;
    }
}


    </style>
</head>
<body>
    <div class="container-fluid">
      <!-- Navbar -->
       <div class="row mb-4 ">
  <div class="col-md">
    <nav class="navbar navbar-expand-lg user-menu fixed-top">
    
        <div class="p-2 animate__animated animate__tada">
          <img src="assets/images/logo.png" alt="brand logo" width="70px">
        </div>
        <span class="navbar-brand px-2" style="color:black; text-shadow: 2px 2px skyblue">Home Services.com</span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar navbar-collapse px-4" id="navbarContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <?php if (!isset($_SESSION['useronline']) && !isset($_SESSION['vendonline'])): ?>
              <li class="nav-item"><a class="nav-link active px-4" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link active px-4" href="aboutus.php">About Us</a></li>
              <li class="nav-item"><a class="nav-link active px-4" href="faq.php">FAQ</a></li>
              <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Register Now!</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="vendregister.php">Vendor Sign Up</a></li>
                  <li><a class="dropdown-item" href="vendlogin.php">Vendor Login</a></li>
                  <li><a class="dropdown-item" href="register.php">Customer Sign Up</a></li>
                  <li><a class="dropdown-item" href="login.php">Log In</a></li>
                </ul>
              </li>
            <?php elseif (isset($_SESSION['useronline'])): ?>
              <li class="nav-item"><a class="nav-link active" href="userpage.php">Profile</a></li>
              <li class="nav-item dropdown">
                <a class="btn dropdown-toggle" href="#" data-bs-toggle="dropdown">
                  <img src="assets/images/<?php echo $photo['file_name']; ?>" width="30" style="border-radius: 50%;"> Hi, <?php echo $check['cust_uniquerusername']; ?>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="userpage.php">Profile</a></li>
                  <li><a class="dropdown-item" href="user_profile.php">Add Profile Picture</a></li>
                  <li><a class="dropdown-item" href="user_profileu.php">Change Profile Picture</a></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </li>
            <?php elseif (isset($_SESSION['vendonline'])): ?>
              <li class="nav-item"><a class="nav-link active" href="vendorpage.php">Dashboard</a></li>
              <li class="nav-item dropdown">
                <a class="btn dropdown-toggle" href="#" data-bs-toggle="dropdown">
                  Hi, <?php echo $check['vendor_brandname']; ?>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="vendorpage.php">Dashboard</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modal">Add Profile Picture</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modal2">Change Profile Picture</a></li>
                  <li><a class="dropdown-item" href="vlogout.php">Logout</a></li>
                </ul>
              </li>
            <?php endif; ?>
          </ul>
        </div>
    </nav>
  </div>
</div>
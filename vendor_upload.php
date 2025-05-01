<?php

            session_start();
            require_once "vendor_guard.php";
            require_once "classes/User.php";
      
            $user = new User;
            $id = isset($_SESSION['vendonline']) ? $_SESSION['vendonline'] : "header('location:index.php')";
      
            $service = $user->fetch_services_type();
    require_once "partials/header.php";
?>

        <!-- end of navbar -->
            <div class="row py-5 my-5">
                <div class="col-md-5 offset-md-2 shadow-lg bg-body-transparent rounded p-3">
                <form action="process/user_photo.php" method="post" enctype="multipart/form-data">
        
                        <h1>Upload Profile Picture</h1>
                        <?php
                                            if(isset($_SESSION['errmsg'])){
                                    ?>
                                                <div class="alert alert-danger">
                                                <p><?php echo $_SESSION['errmsg'] ;?></p>
                                                <p><?php unset ($_SESSION['errmsg']) ;?></p>
                                                </div>
                                    <?php
                                            }
                                    ?>
                                    <?php
                                            if(isset($_SESSION['feedback'])){
                                    ?>
                                                <div class="alert alert-info">
                                                <p><?php echo $_SESSION['feedback'] ;?></p>
                                                <p><?php unset ($_SESSION['feedback']) ;?></p>
                                                </div>
                                    <?php
                                            }
                                            ?>
                        
                        <div class="mb-3">
                            <label for="dp">Upload Image</label>
                        <input type="file" name="dp" class="form-control" id="dp">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" name="upload">Upload</button>
                        </div>
                </form>
                    
            </div>
        
         
                <div class="col-md-4">
                   <div class="shadow-lg bg-body-transparent rounded ">
                    <img src="assets/images/brand-page-laptop.png" alt="brand laptop" width="100%" height="200px" >
                   </div>
                </div>
            </div>
        </div>


                                <!-- footer -->
            <div class="container-fluid mt-5">
            <div class="row ">
                <div class="col-lg-4 col-md-6 p-3 py-4 px-5" style="background-color:lightblue;">
                    <h4 class="text-primary mb-4 mt-5">Get In Touch</h4> 
                    <hr>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3 text-primary"></i>11 Boju Road, Farin Gida, Mand Kaduna State, Nigeria</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3 text-primary"></i>(+234) 07080375517</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3 text-primary"></i>info@anyservice.ng</p>
                </div>
                <div class="col-lg-4 col-md-6 p-3 py-4 px-5" style="background-color:lightblue;">
                    <h4 class="text-primary mb-4 mt-5">Quick Links</h4>
                    <hr>
                    <p><a class="btn" href="userpage.php">Profile</a></p>
                    <p><a class="btn" href="aboutus.php">About Us</a></p> 
                    <p><a class="btn" href="logout.php">Logout</a></p>
                </div> 
                <div class="col-lg-4 col-md-6 py-4 px-5" style="background-color:lightblue;"> 
                    <h4 class="text-primary  mt-5">Follow Us</h4>
                    <hr>
                    <div class="d-flex pt-2" style="background-color:lightblue;">
                        <a class="btn btn-square btn-outline-primary me-1" href="https://twitter.com/@Anyserviceng"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href="https://facebook.com/anyservice.ng"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href="https://www.youtube.com/channel/UCVpOmFL3uru1-zlvtGExing?view_as=subscriber"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-primary me-0" href="https://instagram.com/anyservice.ng_official"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
        </div>
            </div>
      
          <!-- footer ends -->

          <!-- copyrightstart -->

          <div class="container-fluid bg-primary copyright text-white py-4  fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 text-center bg-primary text-md-start">
                    &copy; <a href="#"  class="text-decoration-none text-white">HomeServices.ng</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center bg-primary text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com" class="text-decoration-none text-white">Giwa Boluwaitfe</a>
                </div>
            </div>
        </div>
    </div>
        
           <!-- copyright ends -->
<?php require_once "partials/footer.php"?>
           
<?php

            session_start();
    require_once "partials/header.php";
?>

        <!-- end of navbar -->
            <div class="row py-5 my-4 mx-2">
                <div class="col-md-6  shadow-lg bg-body-transparent rounded p-3">
                    <form action="process/processvd_login.php" method="post" id="log" class="p-3" autocomplete="off">
                        <h1>Log In</h1>
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
                        <div class="mb-2 form-floating">
                        <input type="email" placeholder="Username" name="user" class="form-control">
                        <label for="Username">Email</label><br><br>
                        </div>
                        <div class="mb-2 form-floating">
                        <input type="password" placeholder="Password" name="pass" class="form-control">
                        <label for="password">Password</label><br><br>
                        </div>
                        <div class="mb">
                       <button class="btn btn-outline-primary col-10 m-2 p-3" name="btnloginv" type="submit">Log In</button>
                        </div>
                    </form>
                    <br>
                    <span>New User?<a href="register.php" class="p-2 ">Sign Up</a></span>
                    <span> | New Service Provider?<a href="vendregister.php" class="p-2">Log In</a></span>
                </div>
                <div class="col-md-6">
                   <div class="shadow-lg bg-body-transparent rounded ">
                    <img src="assets/images/brand-page-laptop.png" alt="brand laptop" width="100%" >
                   </div>
                </div>
            </div>
        </div>

            <!-- footer starts -->
      
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-lg-4 col-md-6 p-3 py-4 px-5" style="background-color:lightblue;">
                        <h4 class="text-primary mb-4 mt-5">Get In Touch</h4> 
                        <hr>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3 text-primary"></i>No 6, Chika Eze Close, L and K Estate, Langbasa Ajah, Lagos State.</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3 text-primary"></i>(+234) 09163310932</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3 text-primary"></i>olanrewajugiwa8@gmail.com</p>
                    </div>
                    <div class="col-lg-4 col-md-6 p-3 py-4 px-5" style="background-color:lightblue;">
                        <h4 class="text-primary mb-4 mt-5">Quick Links</h4>
                        <hr>
                        <p><a class="btn" href="index.php">Profile</a></p>
                        <p><a class="btn" href="aboutus.php">About Us</a></p> 
                        <p><a class="btn" href="faq.php">FAQ</a></p>
                    </div> 
                    <div class="col-lg-4 col-md-6 py-4 px-5" style="background-color:lightblue;"> 
                        <h4 class="text-primary  mt-5">Follow Us</h4>
                        <hr>
                        <div class="d-flex pt-2 me-5" style="background-color:lightblue;">
                            <a class="btn btn-square btn-outline-primary me-1" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-outline-primary me-1" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-outline-primary me-0" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
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
                        &copy; <a href="#"  class="text-decoration-none text-white">HomeServices.com</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center bg-primary text-md-end">
                        Designed By <a href="#" class="text-decoration-none text-white">Giwa Olanrewaju Boluwaitfe</a>
                    </div>
                </div>
              </div>
          </div>
                        
           <!-- copyright ends -->
<?php require_once "partials/footer.php"?>
           
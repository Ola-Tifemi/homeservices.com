<?php

      session_start();
      require_once "user_guard.php";

      require_once "classes/User.php";
      
      $user = new User;
      $id = isset($_SESSION['useronline']) ? $_SESSION['useronline'] : "header('location:index.php')";

      $service = $user->fetch_services_type();
      $photo = $user->fetch_profile_photo($id);
    $check = $user->get_user($id);
    //  echo "<pre>";
    //   print_r($photo);
    //   echo "</pre>";
    //   exit;
   
    require_once "partials/header.php";
?>

        <div class="row mt-5 pt-4">
            <div class="col-md-6 offset-md-3">
            <ul id="resultsList" class="list-group mt-3"></ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-2 mt-5 m-2">
                <div class="col-md-12 col-lg-12 col-sm-12 text-center text-primary p-3  animate__animated animate__bounceInUp ">
                    <h2>BOOK A SERVICE TODAY!!</h2>
                    <hr><hr>
                  </div>
            </div>
            <div class="row">
                <div class="col-md-5 offset-md-2">
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
                                                <div class="alert alert-success">
                                                <p><?php echo $_SESSION['feedback'] ;?></p>
                                                <p><?php unset ($_SESSION['feedback']) ;?></p>
                                                </div>
                                    <?php
                                            }
                                            ?>
                </div>
            </div>
             <!-- COOKING -->
        <div class="row mx-5 mouse">
          <div class="col-md-10 offset-2 mt-3 mb-3 col-lg-6">
            <img src="assets/images/<?php 
                echo $photo['file_name'];
            ?>" alt="profile photo" class="img-fluid shadow" width="250px" style="border-radius:40%;">
            <h3 class="text-primary pt-3">Hi, <?php echo $check['cust_uniquerusername'];?></h3>
            <h5>We are thrilled to have you here! Book an Appointment Today!</h5>
            <h6>Here are services Available Today!</h6> 
            </div>
        </div>
        <div class="row">
            <?php
                    foreach($service as $s){
            ?>
                    <div class="col-md-6 col-lg-4 col-sm-12 p-3 px-3 py-4"> 
                <form>
                    <div class="mb-3 card-body">
                        <div class="card shadow-lg bg-tertiary rounded" style="width: 22rem;">
                            <img src="admin/assets/images/<?php echo $s['photoname'];?>" class="card-img-top" alt="service type picture" height="320px">
                            <div class="card-body">
                              <h5 class="card-title"><?php echo $s['type_name']?></h5>
                              <p class="card-text"> Available Services Include: <?php echo $s['sertype_desc']?>. <br> Click below to Book Now!!</p>
                              <a class="btn btn-outline-primary" href="use_vend.php?id=<?php echo $s['type_id'];?>">
                  Book A service!!
                </a>
                    </div>
                          </div>
                       
                          
                          
                    </div>
                </form>
            </div> 
            
            <?php
                    }
            ?>
       </div>                     
            

       <div class="container-fluid mt-5">
            <div class="row ">
                <div class="col-lg-4 col-md-6 p-3 py-4 px-5" style="background-color:lightblue;">
                    <h4 class="text-primary mb-4 mt-5">Get In Touch</h4> 
                    <hr>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3 text-primary"></i>6, Chika Eze Close, L and K Estate, Ajah, Lagos State.</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3 text-primary"></i>(+234) 09163310932</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3 text-primary"></i>olanrewajugiwa@gmail.com</p>
                </div>
                <div class="col-lg-4 col-md-6 p-3 py-4 px-5" style="background-color:lightblue;">
                    <h4 class="text-primary mb-4 mt-5">Quick Links</h4>
                    <hr>
                    <p><a class="btn" href="userpage.php">Profile</a></p> 
                    <p><a class="btn" href="logout.php">Logout</a></p>
                </div> 
                <div class="col-lg-4 col-md-6 py-4 px-5" style="background-color:lightblue;"> 
                    <h4 class="text-primary  mt-5">Follow Us</h4>
                    <hr>
                    <div class="d-flex pt-2" style="background-color:lightblue;">
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
                    &copy; <a href="#"  class="text-decoration-none text-white">HomeServices.ng</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center bg-primary text-md-end">
                    Designed By <a href="#" class="text-decoration-none text-white">Giwa Olanrewaju Boluwaitfe</a>
                </div>
            </div>
        </div>
    </div>
        
           <!-- copyright ends -->
        <?php require_once "partials/footer.php"?>
  
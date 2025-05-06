<?php

       require_once "classes/User.php";
      
      $user = new User;
       $service = $user->fetch_services_type();
 
    require_once "partials/header.php";
?>
      
          <div class="row mt-5 mb-3">
    <div class="col-12 position-relative p-0" style="
        background-image: url('assets/images/happy-black-lady-cleaning.webp');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 85vh; animation: backgroundAnimation 10s infinite ease-in-out;
    ">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="
            background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.3));
            z-index: 1;
        "></div>

        <!-- Text Layer -->
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3" style="animation: textAnimation 2s ease-out;z-index: 2; background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3));">
            <h2 class="fw-bold mb-3">Making Home Services Effortless</h2>
            <p class="lead m-0">Connect easily with trusted service providers near you — fast, reliable, and stress-free.</p>
        </div>
    </div>
</div>



<div class="row">
  <div class="col-md fixed-bottom">
    <div class="alert alert-info fade show alert-dismissible text-primary" style="background-color:beige;" role="alert">
      <p>At HomeServices.com, we strive to connect you with trusted service providers. Each provider is thoroughly verified before being invited to join our platform. However, as a user, please note that it is your responsibility to assess and engage with the providers at your discretion. By continuing to use this platform, you consent to the processing of your personal data in accordance with NDPR and other applicable regulations.</p>
      
      <p align="right"><button class="btn btn-outline-primary btn-sm" data-bs-dismiss="alert">Got it</button></p>
    </div>
  </div>
</div>



              <div class="row">
                <div class="col-md-12  text-center text-primary bounce">
                  <h2>LET US HELP YOU DO IT..</h2>
                  <hr><hr>  
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 col-sm-4 align-center">
                  <img src="assets/images/bored-sad-black-girl-roll.png" class=" img-fluid bounce" alt="bored-sad-black" width="380px">
                </div>
                <div class="col-md-8 col-sm-8 px-4">
                      <h5 class=" m-3">Do you need to maintain and repair essential systems in your house like plumbing, electrical, heating/cooling, clean your home professionally,
                        or to receive personal assistance with daily tasks; essentially, 
                        to keep your home functioning properly and comfortable without having to handle every task yourself <br>
                          <i class="fa-solid fa-question text-primary bounce2" style="font-size: xxx-large;"></i> </h5>
                          <h4>You are at the right <span  class="text-primary">place...</span>      
                          <img src="assets/images/smile_emoji_preview.png" alt="smile_emoji_preview" width="100px" class="bounce2">
                        </h4>
                </div>
              </div>
            
            
                <div class="row">
                        <div class="col-md-12 text-center text-primary" >
                          <h2>WHAT WE DO?</h2>
                          <hr><hr>
                        </div>
                </div>

                    <!--Service Listing -->
        <div class="row g-4">
    <?php foreach($service as $s){ ?>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card h-100 shadow-lg bg-tertiary rounded">
            <img src="admin/assets/images/<?php echo $s['photoname'];?>" class="card-img-top img-fluid" alt="service type picture" style="height: 320px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo ucfirst($s['type_name'])?></h5>
                <p class="card-text flex-grow-1">
                    Available Services Include: <?php echo $s['sertype_desc']?>. <br>
                    Click below to Book Now!!
                </p>
                <a class="btn btn-outline-primary mt-2" href="use_vend.php?id=<?php echo $s['type_id'];?>">
                    Book A Service!!
                </a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
          
                <!--Service Listing end -->
                    
              <div class="row p-3 m-2">
                  <div class="col-md-6 p-5 align-center bounce3">
                    <img src="assets/images/home_barb.webp" width="450px" alt="home_barb" class="img-fluid">
                    
                  </div>
                  <div class="col-md-6 p-3">
                      
                      <h4>We <span  class="text-primary">connect</span>  you with different vendors for your every day needs.</h4>
                      <div class="" width="50px"><hr></div>
                      <h5>Our vendors are reliable, easy to access and certified professionals
                          with just enough experience to get the job done.
                      </h5>
                      <h5>Our vendor's Services include: <ul>
                          <li>SALON SERVICES</li>
                          <li>LAUNDRY SERVICES</li>
                          <li>CLEANING SERVICES</li>
                          <li>COOKING SERVICES</li>
                          <li>ELECTRICAL SERVICES</li>
                          <li>PERSONAL SHOPPING</li>
                      </ul> and many more.....</h5>
                  </div>
              </div>
                <div class="row  p-3 m-2">
                        <div class="col-md-6 p-4">
                            <h3>You can also book a long term service from your preferred vendor and get a discount...</h3>
                            <div class="" width="50px"><hr></div>
                            <h5>Just have an agreement with your preferred vendor and keep getting it done for you!! <i class="text-primary">It's really that easy..</i> </h5>
                        </div>
                        <div class="col-md-6 p-5 align-center bounce4">
                            <img src="assets/images/excited-fat-african.webp" width="450px" alt="excited-fat-african" class="img-fluid">
                        </div>
                </div>

                <div class="row">
                  <div class="text-center text-primary bounce5">
                        <h2>CORE VALUES?</h2>
                        <hr><hr>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-8 offset-md-2">                    
                    <span style="font-size: large;">We are committed to: 
                      <br><br>
                    <ul>
                        <li>Customer Focus: Prioritizing the needs and satisfaction of clients.</li>
                        <li>Reliability: Consistently delivering dependable service.</li>
                        <li>Integrity: Acting honestly and ethically in all interactions.</li>
                        <li>Quality Workmanship: Ensuring high standards in all work performed.</li>
                        <li> Professionalism: Demonstrating expertise and respect in every aspect of the business.</li>
                        <li>Responsiveness: Quickly addressing client inquiries and concerns.</li>
                    </ul>
                      
                      These values aim to build trust with clients, maintain high standards, and deliver excellent service with integrity and professionalism.</span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md navbar">
                   
                      <a href="login.php" class=
                      "btn btn-primary mx-auto">Book an Appointment Now!!</a>
                    
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
    
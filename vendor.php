<?php
    require_once "partials/header.php";
?>
           <div class="row">
            <div class="col-md-8 offset-md-2">
                <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="assets/images/portrait-mid.webp" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="assets/images/excited-fat-african.jpg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-2 m-2">
                <div class="col-md-12 col-lg-12 col-sm-12 text-center text-primary p-3  animate__animated animate__bounceInUp ">
                    <h2>BOOK A SERVICE TODAY!!</h2>
                    <hr><hr>
                  </div>
            </div>
             <!-- COOKING -->
        <div class="row m-5 ">
          <div class="col-md-6">
            <img src="assets/images/male_avatar.png" alt="male avatar" style="border-radius:50%">
            <h3 class="text-primary text-center pt-3">Hi, Olanrewaju</h3>
            <h5>We are thrilled to have you here! Book an Appointment today</h5>
                <a class="btn btn-outline-primary" data-bs-toggle="offcanvas" href="#offcanvas" role="button" aria-controls="offcanvas">
                  Book service
                </a>


                
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
                            <div class="offcanvas-header">
                              <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas</h5>
                              <button type="button" class="btn-close btn-primary" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                              <!-- Button trigger modal -->
                            <div class="accordion" id="accordionExample">
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Accordion Item #1
                                      </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                      <div class="accordion-body">
                                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Accordion Item #2
                                      </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                      <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Accordion Item #3
                                      </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                      <div class="accordion-body">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                                                
                            </div>
                          </div>
          </div>
            <div class="col-md-4 align-center p-3 px-3 "> 
                <form">
                    <div class="mb-3">
                        <div class="card shadow-lg bg-tertiary rounded" style="width: 20rem;">
                            <img src="cheerful-young-black-lady.jpg" class="card-img-top" alt="cheerful-young-black-lady" height="320px">
                            <div class="card-body">
                              <h5 class="card-title">COOKING SERVICES</h5>
                              <p class="card-text">Craving Continental, Internal, Local Dishes or need fingerlings for a game night or little party. <br> Click below to Book Now!!</p>
                            </div>
                          </div>
                       
                          
                          
                    </div>
                </form>
            </div> 


             <!-- footer starts -->

  
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
  
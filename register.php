<?php
    session_start();
    require_once "classes/User.php";
    $loc = new User;
    $state = $loc->fetch_all_state();
    require_once "partials/header.php";
?>

            <div class="row">
                <div class="col-md-12">
                    <h2 id="dis"></h2>
                </div>
            </div>
            <div class="row m-5 p-3">
                <div class="col-md-8 shadow bg-tertiary rounded">
                    <h2 class="text-primary m-3 text-center">CREATE AN ACCOUNT</h2>
                    <div class="p-3 ">
                        <span>Already have an account?<a href="login.php" class="p-2">LogIn</a></span>
                        <span>| New Service Provider?<a href="vendregister.php" class="p-2">Sign Up!</a></span>
                        <div class="col-md-8 col-sm-12 align-center p-2">
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
                            <form action="process/process_register.php" method="post" class="my-3 mx-2" autocomplete="off">
                                <div class="d-flex">
                                    <div class="mb-3 form-floating">
                                        <input type="text" name="fullname" placeholder="Enter Fullname" class="form-control" required>
                                        <label for="">Enter Name:</label>
                                    </div>
                                    <div class="mb-3 form-floating px-1">
                                        <input type="text" name="username" placeholder="Enter Fullname" class="form-control" required>
                                        <label for="">Enter Username:</label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="mb-3 form-floating">
                                        <input type="email" name="email" placeholder="Email Address" class="form-control" required >
                                        <label for="">Email:</label>
                                    </div>
                                    <div class="mb-3 form-floating px-1">
                                        <input type="text" name="number" placeholder="Enter Phonenumber" class="form-control" required >
                                        <label for="">Phone Number:</label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="mb-3">
                                        <label for="">Select State</label>
                                        <select name="state" id="state" class="form-select">
                                            <option value="">Select State</option>
                                            <?php
                                                foreach($state as $st){
                                                    ?>
                                                    <option value="<?php echo $st['state_id'];?>"><?php echo $st['state_name'];?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3 px-3">
                                        <label for="">Select LG</label>
                                        <select name="lg" id="lg" class="form-select">
                                            <option value="">Select Lg</option>
                                        </select>
                                    </div>
                                </div>
                               <div class="d-flex">
                                    <div class="mb-3 form-floating"> 
                                            <input type="password" name="cpass" placeholder="Enter password" class="form-control" required >
                                            <label for="">Create Password:</label>
                                        </div>
                                        <div class="mb-3 form-floating px-2"> 
                                            <input type="password" name="cpass2" placeholder="Confirm password" class="form-control" required >
                                            <label for="">Confirm Password:</label>
                                    </div>
                               </div>
                                <div class="mb-3 form-floating">
                                <textarea name="address" id="" class="form-control" ></textarea>
                                <label for="">Address</label>
                                </div>
                                <div class="mb-3">
                                    <input type="checkbox" name="regcheck" id="check"><p>I agree to Terms & conditions</p>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-lg btn-outline-primary col-md-8 offset-md-2"  id="btn" name="regbtn">Regsiter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 shadow-lg bg-body-transparent rounded" style="background-image: url(assets/images/brand-page-laptop.png); background-size: cover; padding-left: 200px;">

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

           <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script>
        $(function(){
            $('#state').change(function(){
                 //read the id of the state selected 
                var state_id = $('#state').val();
                
                if(state_id == ''){
                    alert('Select a state');
                }else{
                    $("#lg").load('server/lg_list.php',{id:state_id});
                }                
            });
        })
    </script>
              <?php require_once "partials/footer.php"?>
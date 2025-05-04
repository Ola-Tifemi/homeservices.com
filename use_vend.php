<?php
    session_start();
    require_once "user_guard.php";     
    require_once "classes/User.php";
    require_once "classes/Vendor.php";


      $user = new User;
      $id = isset($_SESSION['useronline']) ? $_SESSION['useronline'] : "header('location:index.php')";
        
        $photo = $user->fetch_profile_photo($id);

        $check = $user->get_user($id);
      
      $user = new User;
     $cid = $_GET['id'];
      $vendor = $user->fetch_vendors_servicess($cid);
      $vendor_upload = $user-> fetch_vendors_services_type($cid);
      $service_type = $user->fetch_vendors_services_type($cid);
      $service_name = $user->fetch_vendors_services_name($cid);
      $vendor_state = $user->fetch_vendor_state($cid);

      $merged = array_map(null,  $vendor,$service_type,$vendor_upload,$service_name,$vendor_state);
    //   echo "<pre>";
    //   print_r($vendor_upload);
    //   echo "</pre>";
    //   exit;

    require_once "partials/header.php";
?>
        <div class="row">
            <div class="col-md-12 p-2 mt-5 m-2">
                <div class="col-md-12 col-lg-12 col-sm-12 text-center text-primary p-3  animate__animated animate__bounceInUp ">
                    <h2>BOOK A SERVICE TODAY!!</h2>
                    <hr><hr>
                    <a href='userpage.php' class='btn btn-outline-primary'><-- Back</a>
                  </div>
                </div>
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
                                            if(isset($_SESSION['feedbaack'])){
                                    ?>
                                                <div class="alert alert-success">
                                                <p><?php echo $_SESSION['feedbaack'] ;?></p>
                                                <p><?php unset ($_SESSION['feedbaack']) ;?></p>
                                                </div>
                                    <?php
                                            }
                                            ?>
                </div>
            </div>            
  

<?php
    if($merged){
        foreach($merged as [$v, $serv_ty,$upload,$serv_name,$vend_state]){
?>
                    <div class="card mx-auto mb-3 px-3 mx-5 p-2 img-fliud shadow shadow-lg" style="max-width: 720px; background-color:beige;">
                        <div class="row g-0 d-flex">
                            <div class="col-md-6 col-sm-6 px-3 p-2">
                                <img src="assets/images/<?php echo $upload['upload_name']?>" width="400" min-height="100px" class="img-fluid rounded-start" alt="...">
                                <p class="card-title px-2 mt-3">Contact <i class="fab fa-whatsapp text-success"></i>:<a href="https://wa.me/<?php echo $v['vendor_officenumber']?>" class="text-decoration-none"> <?php echo $v['vendor_officenumber']?></a></p>
                                <p class="card-title px-2">Email: <?php echo $v['vendor_email']?></p>
                                <p>STATE:<?php echo $vend_state['state_name']?> State</p>
                                
                                </div>
                                <div class="col-md-6 col-sm-6">
                                <div class="card-body px-3 ">
                                    <h3 class="card-title">Vendor's Name: <?php echo $v['vendor_name']?></h3>
                                    <h4 class="card-title">Company Name: <?php echo $v['vendor_brandname']?></h4>
                                    <span>Address: <?php echo $v['vendor_officeaddress']?> </span>
                                    <h5 class="card-title">Service: <?php echo $serv_ty['type_name']?></h5>
                                    <strong class="card-title">Sub--Service: <?php echo $serv_name['service_name']?></strong>
                                    <p class="card-text text-primary">Service Price: &#8358;<?php echo $serv_ty['service_price']?> <?php echo ucfirst($serv_ty['negotiable'])?></p>
                                    <p class="card-text">Description: <?php echo $serv_ty['servicetype_description']?></p>
                                    <p class="card-text"></p>
                                    <p class="card-text"><small class="text-body-secondary">Last time updated: <?php
                                            $con = strtotime($upload['date_uploaded']);
                                            echo date('d-F-Y', $con);?></small></p>
                                </div>
                            </div>
                        </div>
                        </div>
<?php
        }
    }else{
        echo "<div class='row'><div class='col-md-8 offset-md-2'><h4 class='alert alert-danger text-center'>Oops.. There are no Vendor for this Service Yet!..</h4></div></div>";
    }

?>
             
                                    <!-- footer -->
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
  
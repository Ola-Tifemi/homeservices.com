<?php
    session_start();
    
    require_once "classes/Vendor.php";
    require_once "vendor_guard.php";
    
    $vend = new Vendor;
    
    $id = isset($_SESSION['vendonline']) ? $_SESSION['vendonline'] : "header('location:index.php')";
 
    $check2 = $vend->fetch_services_type();
    $check3 = $vend->fetch_services();
    $service_type = $vend->fetch_vendors_services_type($id); 
    $service = $vend->fetch_vendors_services($id);
    $check = $vend->get_user($id);

    $photo = $vend->fetch_profile_photo($id);

    $merged = array_map(null, $service_type, $service);
    //   echo "<pre>";
    //   print_r($service_type);
    //   echo "</pre>";
    //   exit;
   
    require_once "partials/header.php";
?>


    <div class="row">
        <div class="col-12 text-center text-primary p-3 animate__animated animate__headShake animate__delay-6s">
            <h2>TAKE ACTION TO GET BOOKED!!</h2>
            <hr><hr>
        </div>
    </div>

    <!-- Feedback and Error Messages -->
    <div class="row">
        <div class="col-12">
            <?php if (isset($_SESSION['feedback'])){ ?>
                <div class="alert alert-primary">
                    <p><?php echo $_SESSION['feedback']; ?></p>
                    <p><?php unset($_SESSION['feedback']); ?></p>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['errmsg'])) { ?>
                <div class="alert alert-danger">
                    <p><?php echo $_SESSION['errmsg']; ?></p>
                    <p><?php unset($_SESSION['errmsg']); ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Vendor Profile Section -->
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 text-center">
            <img src="assets/images/<?php echo $photo['file_name'];?>" alt="male avatar" width="250px" style="border-radius:40%">
            <h3 class="text-primary pt-3">Hi, <?php echo $check['vendor_brandname'];?></h3>
            <h5>Get Started Today... Upload Enough of your best works and get booked faster!!</h5>
            <hr>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Update Work</button>
        </div>
    </div>

    <!-- Modal for Work Update -->
    <div class="modal fade" style="background-color:skyblue;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Work</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="process/process_addser_type.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="vendor_id" value="<?php echo $check['vendor_id'];?>">
                        </div>
                        <div class="mb-3">
                            <small class="text-secondary">** Select Major Service</small>
                            <select name="servicetype_id" id="cart" class="form-select">
                                <option value="">Select Service Category</option>
                                <?php foreach ($check2 as $v) { ?>
                                    <option value="<?php echo $v['type_id']; ?>" <?php if($v['type_id'] === true) { echo "selected"; } ?>><?php echo $v['type_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <small class="text-secondary">** Select Major Service Category</small>
                            <select name="service_id" id="cart2" class="form-select">
                                <option value="">Select Sub Service</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="service" class="form-label">Indicate Service Price</label>
                            <input type="price" name="service_price" class="form-control" id="service_price" placeholder="Service Price">
                            <small class="text-secondary">*Indicate if price is negotiable</small>
                            <input type="checkbox" name="negotiable" class="form-check-input" id="negotiable" value="negotiable">
                        </div> 
                        <div class="mb-3">
                            <label for="service" class="form-label">About Service</label>
                            <small class="text-secondary">**Indicate Important Info About your Service</small>
                            <textarea name="about" id="about" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="service" class="form-label">Upload Picture</label>
                            <input type="file" name="upload" class="form-control" id="services">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" name="btnadd">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Display Vendor Works -->
    <div class="row">
        <div class="col-12 text-center text-primary p-3">
            <h2>Here are your works</h2>
            <hr><hr>
        </div>
    </div>

    <div class="row">
        <?php foreach ($merged as [$type, $serv]){ ?>
            <div class="col-12 col-md-6 mb-3">
                <div class="card shadow-lg" style="background-color:beige;">
                    <div class="row g-0">
                        <div class="col-md-4 col-sm-6 mb-3 py-3 px-2">
                            <img src="assets/images/<?php echo $type['upload_name']?>" class="img-fluid rounded-start" alt="service image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $type['type_name']?></h4>
                                <h5 class="card-title">Sub-Service: <?php echo $serv['service_name']?></h5>
                                <p class="card-text">Service Description: <?php echo $type['servicetype_description']?></p>
                                <p class="card-text text-primary">Service Price: &#8358;<?php echo $type['service_price']?> <?php echo ucfirst($type['negotiable'])?></p>
                                <small>
                                    <a href="vendorpage_price.php?id=<?php echo $type['vendor_service_id']?>">
                                        <button type="button" class="btn btn-secondary small" data-bs-toggle="modal" data-bs-target="#eModal">Edit Price</button>
                                    </a>
                                </small>
                                <p class="card-text"><small class="text-body-secondary">Last time updated: <?php echo date('d-F-Y', strtotime($type['date_uploaded'])); ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


<!-- Modal2 for Profile Picture Upload -->
<div class="modal fade"  style="background-color:skyblue;" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Upload Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process/vendor_photo.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="vendor_id" value="<?php echo $check['vendor_id'];?>">
                    <div class="mb-3">
                        <label for="dp">Upload Image</label>
                        <input type="file" name="dp" class="form-control" id="dp">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" name="upload">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal3 for Changing Profile Picture -->
<div class="modal fade"  style="background-color:skyblue;" id="Modal2" tabindex="-1" aria-labelledby="ModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel2">Change Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process/vendor_photou.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="vendor_id" value="<?php echo $check['vendor_id'];?>">
                    <div class="mb-3">
                        <label for="dp">Upload Image</label>
                        <input type="file" name="dp" class="form-control" id="dp">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" name="upload2">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


            <!-- Footer starts -->
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
                    <p><a class="btn" href="vendorpage.php">Profile</a></p> 
                    <p><a class="btn" href="vlogout.php">Logout</a></p>
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

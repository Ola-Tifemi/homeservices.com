<?php

      session_start();
      
      require_once "classes/Vendor.php";
      require_once "vendor_guard.php";
      
      
      $vend = new Vendor;
      $id = isset($_SESSION['vendonline']) ? $_SESSION['vendonline'] : "header('location:index.php')"; 
    
    $check = $vend->get_user($id);
    $cid = $_GET['id'];      

    $service_type = $vend->fetchs_services_type($cid);
    //   echo "<pre>";
    //   print_r($service_type);
    //   echo "</pre>";
    //   exit;
     
   
    require_once "partials/header.php";
?>

<?php
                            
                        foreach($service_type as $type ){
                            ?>
                            
                                <!-- Modal -->
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-6 offset-md-3 mt-5">
                    <div class="modal-body">
                <form action="process/process_price.php" method="post">
                    <input type="hidden" name="servicetype_id" value="<?php echo $type['vendor_service_id']?>">
                    <div class="mb-3">
                    <label for="price" class="form-label text-uppercase text-primary">Edit Service Description</label>
                    <br><small class="text-secondary mb-2">**Optional</small>
                    <input type="text" name="desc" class="form-control" id="" value="<?php echo $type['servicetype_description']?>">
                    </div>
                    <div class="mb-3">
                       <label for="price" class="form-label text-uppercase text-primary">Edit Price</label>
                       <input type="number" name="price" class="form-control" id="" value="<?php echo $type['service_price']?>">
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="vendorpage.php" class="btn btn-dark"><-- Back</a>
                </form>
               </div>
              </div>
            </div>
            </div>
                    </div>
                </div>
            </div>
                        
                    
                            <?php
                        }
                   ?>
                   </div>
                </div>
            </div>  
            
            
                        <!-- end modal -->


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

        
</body>
</html>
        <?php require_once "partials/footer.php"?>
  
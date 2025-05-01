<?php

            session_start();
        require_once "classes/Admin.php";
            $ser = new Admin;
$check = $ser->fetch_services();
$check2 = $ser->fetch_services_type();


// echo "<pre>";
// print_r($check2);
// echo "</pre>";
// exit;
    require_once "partials/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-2">
        <?php 
              if(isset($_SESSION['adminerr'])){
                echo "<div class='alert alert-danger'>
                        <p>".$_SESSION['adminerr']."</p>
                      </div>";
                unset($_SESSION['adminerr']);
              }
          
              if(isset($_SESSION['feedback'])){
                echo "<div class='alert alert-info'>
                        <p>".$_SESSION['feedback']."</p>
                      </div>";
                unset($_SESSION['feedback']);
              }
        ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <table class="table table-striped bordered">
                <thead class="table-dark">
                <tr>
                        <th>S/N</th>
                        <th>Service Name</th>
                        <th>Service Category</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   $sn = 1;
                    foreach($check as $v ){
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $v["service_name"]; ?></td>
                            <td><?php echo $v["type_name"]; ?></td>
                        </tr>
                        
                        <?php
                    }
                   ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2 mt-4 ">
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            ADD SERVICE..
                        </button>

                            <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Admin Update</h5>
                                        <P type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></P>
                                    </div>
                                        <div class="modal-body">
                                            <form action="process/process_addser_type.php" method="post">
                                                <div class="mb-3">
                                                    <label for="service" class="form-label">Enter New Service</label>
                                                    <input type="text" name="service" class="form-control" id="services" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <select name="cart" id="cart">
                                                        <option value="">Select Service Cartegory</option>
                                                        <?php
                                                            foreach($check2 as $v){
                                                               
                                                        ?>
                                                                    <option value="<?php echo $v['type_id']; ?>" <?php if($v['type_id'] == true){echo "selected";}?>><?php echo $v['type_name']?></option>
                                                        <?php
                                                                }
                                                        
                                                            
                                                            ?>
                                                        
                                                      
                                                    </select>
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" name="check" class="form-check-input">
                                                    <label class="form-check-label" >Confrim Update..</label>
                                                </div>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-primary" name="btnupdate">UPDATE</button>
                                            </form>
                                        </div>
                                    <div class="modal-footer">
                                        
                                        
                                </div>
                            </div>
                        </div>
                    </div>

        </div>
    </div>
</div>
<?php require_once "partials/footer.php"?>
           
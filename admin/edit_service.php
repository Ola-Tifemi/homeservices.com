<?php

            session_start();
       
        require_once "classes/Admin.php";
          
        $serv = new Admin;
        $id = $_GET['id']; 
        $menu = $serv->fetch_service_detail($id);

        $service_type = $serv->fetch_services_type();

// echo "<pre>";
// print_r($service_type);
// echo "</pre>";
// exit;
    require_once "partials/header.php";
?>



                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Menu</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"> <a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" >Edit Menu</li>
                        </ol>
                        <div class="row">
                            <div class="col-md">
                                <p align='right'>
                                    <a href="add_serv.php" class="btn btn-dark"><--Back  </a>
                                </p>
                                <form action="process/process_editservice.php" method="post" enctype="multipart/form-data">
                                        
                                <?php
                                        if(isset($_SESSION['adminerr'])){
                                            echo "<p class='alert alert-danger'>".$_SESSION['admin_error']."</p>";
                                            unset($_SESSION['adminerr']);
                                        }
                                        ?>
                                <input type="hidden" name="type_id" id="" readonly  value="<?php echo isset( $menu['type_id']) ?  $menu['type_id']: "";?>">  <!--this unput carries the id so it can be 
                                passed to process page-->
                                <div class="mb-3">
                                    <label for="menu_name">Service Cartegory</label>
                                    <input type="text" name="type_name" id="type_name" class="form-control" value="<?php echo  $menu['type_name'];?>"> 
                                </div>
                                <div class="mb-3">
                                    <label for="menu_name">Service Description</label>
                                    <input type="text" name="servicesdesc" id="type_name" class="form-control" value="<?php echo  $menu['sertype_desc'];?>"> 
                                </div>
                               <div class="mb-3">
                                    <label for="menu_name">Service Image</label>
                                    <input type="file" name="dp" id="dp" class="form-control" > 
                                </div>
                                <div class="mb-3">
                                    <input type="checkbox" name="check" id="" value="1"> I confirm to update this menu
                               </div>
                                <button class="btn btn-primary" name="editserv">Update Menu</button>
                               </form>
                            </div>
                        </div>
                </main>

<?php require_once "partials/footer.php"?>
               
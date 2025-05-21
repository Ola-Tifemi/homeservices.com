<?php 
      

       session_start();
   require_once "classes/Admin.php";
   require_once "admin_guard.php";
   $id = isset($_SESSION['adminonline']) ? $_SESSION['adminonline'] : "header('location:login_form.php')";
    
$ser = new Admin;
$check = $ser->get_admin($id);
$check = $ser->fetch_services_type();
$serv = $ser->fetch_services();
$vend = new Admin;
$count1 = $vend->count_all_vendors();
$count = $vend->count_all_custoemrs();
$check1 = $vend->count_all_services();
$check2 = $vend->count_all_services_sub();


require_once "partials/header.php";
?>


    <main>
            <div class="container-fluid px-4">
                        <h1 class="mt-4">Admin Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">View Page</li>
                        </ol>
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
                        
                            
<div class="container-fluid"style="background-color:lightblue; border-radius:35%">
    <div class="row mb-5 pt-3 pb-2">
        <div class="col-md-12">
        <h1 class="text-primary text-center">Welcome to Home Services Admin Dashboard</h1>
            <p class="text-center text-secondary">You can manage all the services, vendors, and customers from here...</p>
        </div>
    </div>
</div>
<div class="container-fluid" style="background-color:lightblue; border-radius: 20%;">
    <div class="row pt-3">
        <div class="col-md-6">
            <h2 class="text-primary text-center">Total No of Services</h2>
            <div class="mb-3 text-center">
                <button class="btn btn-secondary btn-lg" style=" background-image: linear-gradient(90deg,blue, grey), 
                    linear-gradient(90deg, red, orange, yellow,violet);"><a href="add_serv.php" class='text-decoration-none text-white'><p>No of Services <br><b><?php echo $check1;?></p></a> </b></button>
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="text-primary text-center">Total No of Sub-Services</h2>
            <div class="mb-3 text-center">
                <button class="btn btn-secondary btn-lg" style=" background-image: linear-gradient(90deg,blue, grey), 
                    linear-gradient(90deg, red, orange, yellow,violet);"><a href="add_sub_serv.php" class='text-decoration-none text-white'><p>No of Sub-Services <br><b><?php echo $check2;?></p></a> </b></button>
            </div>
        </div>
    </div>
   <div class="row">
            <div class="col-md-6 py-3">
            <h2 class="text-primary text-center">Total No of Customers</h2>
                <div class="mb-3 text-center">
                    <button class="btn btn-primary btn-lg" style=" background-image: linear-gradient(90deg,grey,blue), 
                    linear-gradient(90deg, red, orange, yellow,violet);"><a href="all_customers.php" class='text-decoration-none text-white'><p>No of Customers <br><b><?php echo $count;?></p></a> </b></button>
                </div>
            </div>
            <div class="col-md-6 py-3">
            <h2 class="text-primary text-center">Total No of Vendors</h2>
                <div class="mb-3 text-center">
                <button class="btn btn-primary btn-lg" style=" background-image: linear-gradient(90deg,grey,blue), 
                    linear-gradient(90deg, red, orange, yellow,violet);"> <a href="all_vendors.php" class="text-decoration-none text-white"> <p>No of Vendors <br><b><?php echo $count1;?></p></b></a></button>
                </div>
            </div>
        </div>
    </div>  
</div>  

            </main>
               
<?php require_once "partials/footer.php"; ?>
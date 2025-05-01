<?php 
      

       session_start();
   require_once "classes/Admin.php";
  
       $ser = new Admin;
$check = $ser->fetch_services_type();
$serv = $ser->fetch_services();
$vend = new Admin;
$count1 = $vend->count_all_vendors();
$count = $vend->count_all_custoemrs();
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
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white p-1 mb-4">
                                    <div class="card-body"><p>VIEW SERVICES</p></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        
                                        <form action="£" method="post">
                                <div class="mb-3">
                                        <select name="select" id="select" class="form-select">
                                                <option value="">View Services</option>
                                                <?php
                                                        foreach($check as $v){
                                                                ?>
                                                        <option value=""><?php echo $v["type_name"];?></option>
                                                                <?php
                                                        }
                                                ?>
                                        </select>
                                </div>
                        </form>
                                       
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-warning text-white p-2 mb-4">
                                    <div class="card-body">VIEW SERVICE SUB-CARTEGORIES</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between p-3">
                                    <form action="£" method="post">
                                <div class="mb-3">
                                        <select name="select" id="select" class="form-select">
                                                <option value="">View Service Sub-cartegories</option>
                                                <?php
                                                        foreach($serv as $v){
                                                                ?>
                                                        <option value=""><?php echo $v["service_name"];?></option>
                                                                <?php
                                                        }
                                                ?>
                                        </select>
                                    </div>
                                 </form>
                                </div>
                                </div>
                                </div>
                            </div>
                            <div class="container-fluid">
   <div class="row">
            <div class="col-md-6 py-3">
            <h2 class="text-primary text-center">Total No of Customers</h2>
                <div class="mb-3 text-center">
                    <button class="btn btn-primary btn-lg"><a href="all_customers.php" class='text-decoration-none text-white'><p>No of Customers <br><b><?php echo $count;?></p></a> </b></button>
                </div>
            </div>
            <div class="col-md-6 py-3">
            <h2 class="text-primary text-center">Total No of Vendors</h2>
                <div class="mb-3 text-center">
                <button class="btn btn-warning btn-lg"> <a href="all_vendors.php" class="text-decoration-none"> <p>No of Vendors <br><b><?php echo $count1;?></p></b></a></button>
                </div>
            </div>
        </div>
        

            </main>
               
<?php require_once "partials/footer.php"; ?>
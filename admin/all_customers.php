<?php
       session_start();
        require_once "classes/Admin.php";
        require_once "admin_guard.php";
        $id = isset($_SESSION['adminonline']) ? $_SESSION['adminonline'] : "header('location:login_form.php')";
    
        $ser = new Admin;
        $cust = new Admin;
        $check = $ser->get_admin($id);
        $customers = $cust-> fetch_customers();
        // echo '<pre>';
        // print_r($customers);
        // echo '</pre>';
        // exit;
        require_once "partials/header.php";
        
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12"  >
                <table class="table table-bordered table-striped" >
                    <h2 class="text text-center text-primary">All Registered Vendors</h2>
                    <thead class="table table-dark" >

                 <?php
                    if(isset($_SESSION['feedback'])){
                        echo "<div class='alert alert-info'>
                                <p>".$_SESSION['feedback']."</p>
                            </div>";
                        unset($_SESSION['feedback']);
                    }
                    ?>
                    <?php
                    if(isset($_SESSION['adminerr'])){
                        echo "<div class='alert alert-danger'>
                                <p>".$_SESSION['adminerr']."</p>
                            </div>";
                        unset($_SESSION['adminerr']);
                    }
                    ?>
                        <tr class="mx-2" cellspacing="5">
                            <th>S/N</th>
                            <th>Vendor Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $sn =1;
                            foreach($customers as $v){                            
                        ?>

                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $v['cust_fullname'];?></td>
                                <td><?php echo $v['cust_email'];?></td>
                                <td><?php echo $v['cust_uniquerusername'];?></td>
                                <div class="col-md-3"><td><form action="process/process_delete2.php" method="post"><button class="btn btn-danger" value=
                                    '<?php echo $v['cust_id']?>' name="btndelete"> Delete</button></form></td></div>    
                            </div>
                                <td><a class="btn btn-primary" href="all_customer.php?id= <?php echo $v['cust_id'] ?>">Details</a> </td>
                               
                            </tr>
                            

                        <?php
                            }
                        ?>
                    </tbody>                    
                        </table>
                        <a href="index.php" class="btn btn-primary mx-3"><-- Back</a>
            </div>
        </div>
<?php require_once "partials/footer.php"; ?>
<?php
       session_start();
        require_once "classes/Admin.php";
       
        $cust = new Admin;
        
        $customers = $cust-> fetch_all_vendors();
        require_once "partials/header.php";
        
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12"  >
                <table class="table table-bordered table-striped" >
                    <h2 class="text text-center text-primary">All Registered Vendors</h2>
                    <thead class="table table-dark">

                 <?php
                    if(isset($_SESSION['feedback'])){
                        echo "<div class='alert alert-info'>
                                <p>".$_SESSION['feedback']."</p>
                            </div>";
                        unset($_SESSION['feedback']);
                    }?>
                        <tr class="mx-2" cellspacing="5">
                            <th>S/N</th>
                            <th>Vendor Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Address</th>
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
                                <td><?php echo $v['vendor_name'];?>     </td>
                                <td><?php echo $v['vendor_email'];?>     </td>
                                <td><?php echo $v['vendor_officenumber'];?>    </td>
                                <td><?php echo $v['vendor_officeaddress'];?>    </td>
                                <div class="col-md-3"><td><form action="process/process_delete.php" method="post"><button class="btn btn-danger" value=
                                    '<?php echo $v['vendor_id']?>' name="btndelete"> Delete</button></form></td></div>    
                                </div>
                                <td><a class="btn btn-primary" href="all_vendor.php?id=<?php echo $v['vendor_id'] ?>">Details</a> </td>
                               
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
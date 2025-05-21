<?php
        require_once 'classes/Admin.php';
        require_once "admin_guard.php";
        $id = isset($_SESSION['adminonline']) ? $_SESSION['adminonline'] : "header('location:login_form.php')";
    
        $ser = new Admin;
        $cust = new Admin;
        $check = $ser->get_admin($id);
        $cid = $_GET['id'];
        $customer_detail = $cust->fetch_customers_detail($cid);

        //$d = $cust->delete_vendor($cid);

        //     echo '<pre>';
        //     print_r($customer_detail);
        //  echo '</pre>';
        //  exit;
        require_once "partials/header.php";

        // $cust2 = new Customer;
        // $customer_name = $cust2-> fetch_all_customers();


        
?>



<body>
   <div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
        <?php
     if ($customer_detail){
    ?>
   
    <table class="table table-striped">
        <tr>
            <th>Vendor Name</th>
            <td><?php echo $customer_detail['cust_fullname']?></td>
        </tr>
        <tr>
            <th>Unique Name</th>
            <td><?php echo $customer_detail['cust_uniquerusername']?></td>
     </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $customer_detail['cust_email']?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $customer_detail['cust_address']?></td>
        </tr>
        <tr>
            <th>City</th>
            <td><?php echo $customer_detail['state_id']?>
        </tr>
        <tr>
            <th>Registered</th>
            <td><?php echo $customer_detail['date_registered']?></td>
        </tr>
      
        
        
    </table>
    <?php
    }else {
        echo  "<p class='alert alert-danger'>Sorry No User with ID</p>";
    }
    ?>
     <a href="all_customers.php" class="btn btn-primary"> <-- Back</a>
        </div>
        </tr>
        </tr>
  
    <?php require_once "partials/footer.php"; ?>
<?php
require_once "../classes/Admin.php";
$ser = new Admin;
   
// Check if service_id is set via POST request
if (isset($_POST['service_id'])){

    // Get the service ID from the POST request 

   
    $serviceId = $_POST['service_id'];
        
    $check = $ser->delete_service_type($serviceId);

    // Database credentials (adjust as necessary)
}
else {
    // Log and respond if the service_id is not set in POST
    echo 'error'; // If service_id is not provided
}
?>

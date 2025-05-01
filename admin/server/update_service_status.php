<?php
    
    require_once "../classes/Admin.php";
    $service = new Admin;
if (isset($_POST['service_id']) && isset($_POST['status'])) {
    $serviceId = $_POST['service_id'];
    $newStatus = $_POST['status'];

    //instantiate the class
    

    // Call the method to update the service status
    $result = $service->update_service_status($serviceId, $newStatus);

    if ($result) {
        echo 'success'; // Return success response
    } else {
        echo 'error'; // Return error response
    }
} elseif (isset($_POST['service_id'])) {
    // If only service_id is provided, you can handle it here if needed
    echo 'error'; // If necessary POST parameters are missing
} elseif (isset($_POST['status'])) {
    // If only status is provided, you can handle it here if needed
    echo 'error'; // If necessary POST parameters are missing
} elseif (empty($_POST['service_id']) && empty($_POST['status'])) {
    // If both service_id and status are empty, you can handle it here if needed
    echo 'error'; // If necessary POST parameters are missing
} elseif (empty($_POST['service_id'])) {
    // If only service_id is empty, you can handle it here if needed
    echo 'error'; // If necessary POST parameters are missing
} elseif (empty($_POST['status'])) {
    // If only status is empty, you can handle it here if needed
    echo 'error'; // If necessary POST parameters are missing
} else {
    echo 'error'; // If necessary POST parameters are missing
}
?>
<?php
// Include the database connection file here if needed
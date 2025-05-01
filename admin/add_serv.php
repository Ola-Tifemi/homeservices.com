<?php

            session_start();
        require_once "classes/Admin.php";
            $ser = new Admin;
$check = $ser->fetch_services_type();



// echo "<pre>";
// print_r($check);
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
        <div class="reload"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <table class="table table-striped border">
                <thead class="table-dark">
                <tr>
                        <th>S/N</th>
                        <th>Service Name</th>
                        <th>Service Description</th>
                        <th>Status</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   $sn = 1;
                    foreach($check as $v ){
                        $type_id = $v['type_id'];
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $v["type_name"];?></td>
                            <td><?php echo $v["sertype_desc"];?></td>
                            <td><img src="assets/images/<?php echo $v["photoname"];?>" alt="service type image" width="100px"></td>
                            <td><button class="toggle-status btn btn-warning" data-service-id="<?php echo $v['type_id']; ?>
                            " data-status="<?php echo $v['status']; ?>">
                            <?php echo $v['status'] == 'active' ? 'Deactivate' : 'Activate'; ?>
                            </button>
                            </td>
                            <td><a href='edit_service.php?id=<?php echo $type_id?>'><button  class='btn btn-primary' name='btndelete'>Edit</button></a></td>
                        </tr>
                        
                        <?php
                    }
                   ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2">
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            ADD SERVICE
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
                                            <form action="process/process_addser.php" method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="service" class="form-label">Enter New Service</label>
                                                    <input type="text" name="service" class="form-control" id="services" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="service" class="form-label">Service Description</label>
                                                    <input type="text" name="servicesdesc" class="form-control" id="services" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="file" name="dp" id="dp" class="form-control">
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" name="check" class="form-check-input">
                                                    <label class="form-check-label" >Confrim Update..</label>
                                                </div>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-primary" name="btnadd">UPDATE</button>
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

<script src="assets/js/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
    $('.toggle-status').click(function() {
        var serviceId = $(this).data('service-id'); // Get the service_id
        var currentStatus = $(this).data('status'); // Get the current status
        // Determine the new status (toggle between 'active' and 'inactive')
        var newStatus = (currentStatus === 'active') ? 'inactive' : 'active';
         // alert (newStatus);

        // Send AJAX request to update the status
        $.ajax({
            url: 'server/update_service_status.php', // Path to your PHP script
            type: 'POST',
            data: { 
                service_id: serviceId, 
                status: newStatus 
            },
            success: function(response) {
                //alert(response);
                if (response == 'success') {
                    // Update the button text and status in the DOM
                    var button = $(this);
                    button.data('status', newStatus);  // Update the data-status attribute
                    
                    if (newStatus === 'active') {
                            button.removeClass('btn-danger').addClass('btn-success');
                            button.text(newStatus === 'active' ? 'Reactivate' : 'Activate');
                            alert('Service Activated Successfully Please Reload Page');
                        } else {
                            button.removeClass('btn-success').addClass('btn-danger');
                        }
  // Update the button text
                         $('.reload').append('<p>Service status updated successfully, Please Reload Page.</p>'); 
                         $('p').css({
                        'color': 'green',
                        'font-weight': 'bold',
                        'font-size': '16px',
                        'padding': '10px',
                        'background-color': '#dff0d8',
                        'border': '1px solid #3c763d',
                        'border-radius': '5px',
                        'margin-top': '20px'
                    });// Insert the message at the end of the body
                } else {
                    alert('Error updating service status.');
                }
            },
            error: function() {
                alert('An error occurred.');
            }
        });
    });
});

</script>

      
<?php require_once "partials/footer.php"?>
           
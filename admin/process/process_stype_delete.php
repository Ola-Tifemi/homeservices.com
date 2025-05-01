
<?php

    require_once "../classes/Admin.php";
    $ser = new Admin;
    $check = $ser->fetch_services_type();

    if(isset($_POST['btndelete'])){

        foreach($check as $c){
            $id = $c['type_id'];
        }

        
        $p = new Admin;
       //$d = $p->delete_service_type($id);
       echo "<pre>";
print_r($id);
echo "</pre>";
exit;
       if($d){
        echo "Service deleted";
       }else{
        //echo "An error occured";
       }
       
    }else{
        // header ("location:../delete.php");
        // exit;
        echo "You need to click delete";
    }
?>
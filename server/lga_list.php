<?php
    require_once "../classes/Vendor.php";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        // print_r($id);
        //  exit;
       
        $lg = new Vendor;
        $lgid = $lg->fetch_all_by_stateid($id);
    
        foreach($lgid as $lga){
            $xyz = $lga['lga_id'];
                        echo "<option value='$xyz'>".$lga['lga_name']."</option>";
        }
    }

?>
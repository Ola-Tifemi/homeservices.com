<?php
    require_once "classes/Vendor.php";

    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $vendserv = new Vendor;
        $check3 = $vendserv->fetch_all_services_type($id);

        print_r($check3);
     
            foreach($check3 as $c){
   
            ?>
        <option value="<?php echo $c['service_id']; ?>"<?php if($c['service_id'] == true){echo "selected";}?>><?php echo $c['service_name']?></option>
            <?php
            }                                                            
  
    }

?>

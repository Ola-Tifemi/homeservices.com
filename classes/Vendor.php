<?php
        require_once "Db.php";
class Vendor extends Db{

    private $conn;
    public function __construct(){
            $this->conn = $this->connect();
    }
    public function logout(){
        unset($_SESSION['vendonline']);
        session_destroy();
    }
  
    public function fetch_all_state(){
        $sql  = "SELECT * FROM state";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $state = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $state;
    }
    public function fetch_all_by_stateid($state_id){
        $sql  = "SELECT * FROM lga WHERE state_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$state_id]);
        $lgs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lgs;
    }

    public function update_vendor_work($service_desc,$service_price,$id){
        try{
            $sql = "UPDATE vendor_service SET servicetype_description=?,service_price=?
             WHERE vendor_service_id =?";
            $stmt = $this->conn->prepare($sql);
            $id = $stmt->execute([$service_desc,$service_price,$id]);
            return $id;
        }catch(PDOException $e){
            echo   $e->getMessage();
            return false;
       } 
    }

    public function fetch_profile_photo($id){
        $sql = "SELECT file_name FROM vendor_profile JOIN vendors ON profvend_id = vendor_id WHERE profvend_id =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]); 
        $service = $stmt->fetch(PDO::FETCH_ASSOC);
        return $service;
    }
    public function update_profile($tempname,$filename,$unique_name,$vendorid){
       
        if(move_uploaded_file($tempname,$filename)){
            $sql = "UPDATE vendor_profile SET file_name=? WHERE profvend_id =?";
            $stmt = $this->connect()->prepare($sql);
            $res = $stmt->execute([$unique_name,$vendorid]);
            if($res){
                $_SESSION['feedback'] = "Profile Picture Updated";
                header('location:../vendorpage.php');
                exit;
            }else{
                echo "File not Uploaded and Added";
            }
        }else{
            return "Unable to Upload";
        }
    }

    public function insert_profile($tempname,$filename,$unique_name,$vendorid){
       
        if(move_uploaded_file($tempname,$filename)){
            $sql = "INSERT INTO vendor_profile SET file_name=?, profvend_id =?";
            $stmt = $this->connect()->prepare($sql);
            $res = $stmt->execute([$unique_name,$vendorid]);
            if($res){
                $_SESSION['feedback'] = "Profile Picture Updated";
                header('location:../vendorpage.php');
                exit;
            }else{
                echo "File not Uploaded and Added";
            }
        }else{
            return "Unable to Upload";
        }
    }
    public function fetchs_services_type_id($id){
        try{
            $sql = "SELECT * FROM vendor_service WHERE vendor_service_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $id;
        }catch(PDOException $e){
            echo   $e->getMessage();
            return false;
       } 
    }
    public function fetchs_services_type($id){
        try{
            $sql = "SELECT type_name,servicetype_description,service_price,vendor_service_id,vendor_id,negotiable
             FROM vendor_service JOIN service_type 
             ON vendor_service.service_type_id  = service_type.type_id WHERE vendor_service_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $id;
        }catch(PDOException $e){
            echo   $e->getMessage();
            return false;
       } 
    }

    public function fetch_vendors_services_type($id){
        try{
            $sql = "SELECT type_name,servicetype_description,service_price,vendor_service_id, negotiable,
             upload_name, date_uploaded 
            FROM vendor_service JOIN service_type  ON vendor_service.service_type_id  =
             service_type.type_id WHERE vendor_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $id;
        }catch(PDOException $e){
            echo   $e->getMessage();
            return false;
       } 
    }
    // public function fetch_vendors_uploads($id){
    //     try{
    //         $sql = "SELECT upload_name, date_uploaded FROM vendor_upload WHERE vendor_id=?";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([$id]);
    //         $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $id;
    //     }catch(PDOException $e){
    //         echo   $e->getMessage();
    //         return false;
    //    } 
    // }
    public function fetch_vendors_services($id){
        try{
            $sql = "SELECT service_name FROM services JOIN vendor_service ON services.service_id= vendor_service.service_id 
             WHERE vendor_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // echo "<pre>";
            // print_r($id);
            // echo "</pre>";
            // exit;    

            return $id;
        }catch(PDOException $e){
            echo   $e->getMessage();
            return false;
       } 
    }
    public function insert_post($tempname,$filename,$unique_name,$vendor_id,$service_id,$servive_type,$servive_desc,$service_price,$negotiable){
       
        if(move_uploaded_file($tempname,$filename)){
            $sql = "INSERT INTO  vendor_service SET upload_name=?, vendor_id=?,service_id=?, service_type_id =?,
            servicetype_description=?, 
            service_price=?,negotiable=?";
            $stmt = $this->conn->prepare($sql);
            $res = $stmt->execute([$unique_name,$vendor_id,$service_id,$servive_type,$servive_desc,$service_price,$negotiable]);
    
            if($res){
                $_SESSION['feedback'] = "Service Type Added";
                header('location:../vendorpage.php');
                exit;
            }else{
                echo "File not Uploaded and Added";
            }
        }else{
            return "Unable to Upload";
        }
    }

    public function get_user($id){
        try{
            $sql = "SELECT * FROM vendors WHERE vendor_id =?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
            exit;
        }catch(PDOException $e){
             echo   $e->getMessage();
             return false;
        }    
    }
    public function fetch_services(){
        $sql = "SELECT * FROM services";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(); 
        $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $service;
    }
    public function fetch_all_services_type($type_id){
        $sql = "SELECT * FROM services WHERE type_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$type_id]); 
        $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $service;
    }
    public function fetch_services_type(){
        $sql = "SELECT * FROM service_type WHERE status=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['active']); 
        $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $service;
    }
    public function login($email,$pass){
        try{

            $sql="SELECT * FROM vendors WHERE vendor_email =?";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([$email]);
            $data=$stmt->fetch(PDO::FETCH_ASSOC);
            if($data){
                $stored_hash=$data['vendor_pass'];
                $check=password_verify($pass,$stored_hash);//returns true or false
                if($check){
                    return $data['vendor_id'];
                }else{
                    $_SESSION['errmsg']="Invalid Password";
                    return false;
                }
             }else{
                $_SESSION['errmsg']="Invalid Email";
                return false;
               
             }   
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }



       }
       public function cacid_exists($cacid){
        $sql = "SELECT * FROM vendors WHERE vendor_cacid  =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$cacid]);
        $data = $stmt->fetch();

        if($data){
            return true;
        }
    }
    public function email_exists($email){
        $sql = "SELECT * FROM vendors WHERE vendor_email =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        $data = $stmt->fetch();

        if($data){
            return true;
        }
    }
    public function username_exists($username){
        $sql = "SELECT * FROM vendors WHERE vendor_uniqueusername  =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        $data = $stmt->fetch();

        if($data){
            return true;
        }
    }

    public function register($fname,$username,$email,$state,$lg,$phone,$address,$pass1,$bname,$cacid){
        $hashed = password_hash($pass1,PASSWORD_DEFAULT);
        $sql = "INSERT INTO vendors SET  vendor_name=?, vendor_uniqueusername=?,vendor_email =?, state_id =?,lga_id =?,
        vendor_officenumber=?, vendor_officeaddress=?, vendor_pass=?, vendor_brandname=?, vendor_cacid =?";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute([$fname,$username,$email,$state,$lg,$phone,$address,$hashed,$bname,$cacid]);
        $id = $this->conn->lastInsertId();
        return $id;
    }
}

// $user = new Vendor;
// $check = $user->fetch_all_services_type(1);
// echo "<pre>";
// print_r($check);
// echo "</pre>";


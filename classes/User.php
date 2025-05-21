<?php
        require_once "Db.php";
class User extends Db{

    private $conn;
    public function __construct(){
            $this->conn = $this->connect();
    }
    public function logout(){
        unset($_SESSION['useronline']);
        session_destroy();
    }
    public function fetch_vendor_state($id){
        $sql  = "SELECT  state_name FROM state JOIN vendors ON vendors.state_id = state.state_id
         JOIN vendor_service  ON vendor_service.vendor_id = vendors.vendor_id WHERE service_type_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $state = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $state;
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


    public function fetch_vendors_uploads($id){
        try{
            $sql = "SELECT upload_name, date_uploaded,servicetype_id  FROM vendor_upload WHERE vendor_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $id;
        }catch(PDOException $e){
            echo   $e->getMessage();
            return false;
       } 
    }
    
    public function fetch_service_detail($id){
        $sql = "SELECT * FROM service_type WHERE type_id  = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

   
    public function fetch_vendors_servicess($id){
        try{
            $sql = "SELECT service_type_id, vendor_name,vendor_officeaddress, vendor_brandname,vendor_officenumber,vendor_email FROM vendor_service JOIN vendors  ON vendor_service.vendor_id = vendors.vendor_id 
            WHERE service_type_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $id;
        }catch(PDOException $e){
            echo   $e->getMessage();
            return false;
       } 
    }

    // public function fetch_vendors_services_upload_date($id){
    //     try{
    //         $sql = "SELECT date_uploaded FROM vendor_upload JOIN vendors  ON vendor_upload.vendor_id =
    //          vendors.vendor_id  WHERE servicetype_id = ? ";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([$id]);
    //         $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $id;
    //     }catch(PDOException $e){
    //         echo   $e->getMessage();
    //         return false;
    //    } 
    // }
    // public function fetch_vendors_services_upload($id){
    //     try{
    //         $sql = "SELECT upload_name FROM vendor_upload JOIN vendors  ON vendor_upload.vendor_id =
    //          vendors.vendor_id  WHERE servicetype_id = ? ";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([$id]);
    //         $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $id;
    //     }catch(PDOException $e){
    //         echo   $e->getMessage();
    //         return false;
    //    } 
    // }
    public function fetch_vendors_services_name($id){
        try{
            $sql = "SELECT service_name FROM vendor_service JOIN services  ON vendor_service.service_id =
             services.service_id  WHERE type_id = ? ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $id;
        }catch(PDOException $e){
            echo   $e->getMessage();
            return false;
       } 
    }
    public function fetch_service(){
        try{
            $sql = "SELECT type_name FROM service_type WHERE status=? ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['active']);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }catch(PDOException $e){
            echo   $e->getMessage();
            return false;
       }
    }
    public function fetch_vendors_services_type($id){
        try{
            $sql = "SELECT type_name, vendor_id,servicetype_description ,service_price,
            negotiable,upload_name,date_uploaded FROM vendor_service JOIN service_type 
             ON vendor_service.service_type_id =
             service_type.type_id WHERE type_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $id;
        }catch(PDOException $e){
            echo   $e->getMessage();
            return false;
       } 
    }
  
    public function fetch_vendors_services($id){
        try{
            $sql = "SELECT service_name FROM services JOIN vendor_service ON services.service_id= vendor_service.service_id 
             WHERE vendor_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $id;
        }catch(PDOException $e){
            echo   $e->getMessage();
            return false;
       } 
    }
    public function fetch_profile_photo($id){
        $sql = "SELECT file_name FROM customers_photo JOIN customers ON
         photocust_id  = cust_id WHERE photocust_id =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]); 
        $service = $stmt->fetch(PDO::FETCH_ASSOC);
        return $service;
    }
    public function update_profile($tempname,$filename,$unique_name,$userid){
       
        if(move_uploaded_file($tempname,$filename)){
            $sql = "UPDATE customers_photo SET file_name=? WHERE photocust_id=?";
            $stmt = $this->connect()->prepare($sql);
            $res = $stmt->execute([$unique_name,$userid]);
            if($res){
                $_SESSION['feedback'] = "Profile Picture Updated";
                header('location:../userpage.php');
                exit;
            }else{
                echo "File not Uploaded and Added";
                exit;
            }
        }else{
            return "Unable to Upload";
        }
    }
    public function insert_post($tempname,$filename,$unique_name,$userid){
       
        if(move_uploaded_file($tempname,$filename)){
            $sql = "INSERT INTO  customers_photo SET file_name=? , photocust_id=?";
            $stmt = $this->connect()->prepare($sql);
            $res = $stmt->execute([$unique_name,$userid]);
            if($res){
                $_SESSION['feedback'] = "Profile Picture Updated";
                header('location:../userpage.php');
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
            $sql = "SELECT * FROM customers WHERE cust_id =?";
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
    public function fetch_services_type(){
        $sql = "SELECT * FROM service_type WHERE status=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['active']); 
        $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $service;
    }
    public function fetch_services_typeid($id){
        $sql = "SELECT * FROM service_type WHERE type_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]); 
        $service = $stmt->fetch(PDO::FETCH_ASSOC);
        return $service;
    }


    public function login($username,$pass){
        try{

            $sql="SELECT * FROM customers WHERE cust_uniquerusername =?";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([$username]);
            $data=$stmt->fetch(PDO::FETCH_ASSOC);
         
            if($data){
                $stored_hash=$data['cust_pass'];
                $check=password_verify($pass,$stored_hash);
                
                if($check){
                    return $data['cust_id'];
                }else{
                    $_SESSION['errmsg']="Invalid credentials";
                    return false;
                }
             }else{
                $_SESSION['errmsg']="Invalid credentials";
                return false;
             }   
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }
    public function email_exists($email){
        $sql = "SELECT * FROM customers WHERE cust_email=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        $data = $stmt->fetch();

        if($data){
            return true;
        }
    }
    public function username_exists($username){
        $sql = "SELECT * FROM customers WHERE cust_uniquerusername =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        $data = $stmt->fetch();

        if($data){
            return true;
        }
    }

    public function register($fname,$username,$email,$state,$lg,$phone,$address,$pass1){
        $hashed = password_hash($pass1,PASSWORD_DEFAULT);
        $sql = "INSERT INTO customers SET  cust_fullname=?,cust_uniquerusername =?, cust_email=?,
        state_id =?,lga_id =? ,cust_phonenumber=?, cust_address=?, cust_pass=?";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute([$fname,$username,$email,$state,$lg,$phone,$address,$hashed]);
        $id = $this->conn->lastInsertId();
        return $id;
    }
}

// $user = new User;
// $check = $user->insert_post('sad','sad_woman.png','post_67ed856b6c65e.png',6);
// echo "<pre>";
// print_r($check);
// echo "</pre>";


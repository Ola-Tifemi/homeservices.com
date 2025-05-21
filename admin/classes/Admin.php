<?php require_once "Db.php";
class Admin extends Db{

    private $conn;
    public function __construct(){
            $this->conn = $this->connect();
    }
    public function logout(){
        unset($_SESSION['adminonline']);
        session_destroy();
    }
    public function fetch_customers(){
        $sql = "SELECT * FROM customers";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(); 
        $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $customer;
    }

    public function update_profile($tempname,$filename,$unique_name,$service_type_name, $type_id, $servicesdesc){
        if(move_uploaded_file($tempname,$filename)){ 
        $sql = "UPDATE service_type SET photoname=?, type_name=?,sertype_desc=? WHERE type_id=?";
        $stmt=$this->conn->prepare($sql);
        $data = $stmt->execute([$unique_name,$service_type_name, $type_id, $servicesdesc]);
        if($data){
                        $_SESSION['feedback'] = "Profile Picture Updated";
                        header('location:../add_serv.php');
                        exit;
            }else{
                        echo "File not Uploaded and Added";
            }
        }else{
            return "Unable to Upload";
        }
   
}

    public function get_admin($id){
        $sql = "SELECT * FROM admin WHERE admin_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function admin_login($username,$password){
        try{
            $sql="SELECT * FROM admin WHERE admin_name=?";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([$username]);
            $data=  $stmt->fetch(PDO::FETCH_ASSOC);
            if($data){
                $hashed_password=$data['admin_pwd'];
                $chk=password_verify($password,$hashed_password);
                if($chk){
                    return $data['admin_id'];
                }else{
                    $_SESSION['adminerr']='invalid password';
                    return false;
                }
            }else{
                $_SESSION['adminerr']='invalid username';
                return false;
            }

        }catch(PDOException $e){
           // $e->getMessage();
            return false;
        }
    }
    public function fetch_all_vendors(){
        $sql = "SELECT * FROM vendors";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(); 
        $vendor = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $vendor; //done
    }
    public function fetch_customers_detail($id){
        $sql = "SELECT * FROM customers WHERE cust_id  = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    
    public function fetch_vendor_detail($id){
        $sql = "SELECT * FROM vendors WHERE vendor_id  = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function count_all_services(){
        $sql = "SELECT* FROM service_type";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $num = $stmt->rowCount();
        return $num;
    }
    public function count_all_services_sub(){
        $sql = "SELECT* FROM services";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $num = $stmt->rowCount();
        return $num;
    }
    public function count_all_vendors(){
        $sql = "SELECT* FROM vendors";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $num = $stmt->rowCount();
        return $num;
    }
    public function count_all_custoemrs(){
        $sql = "SELECT* FROM customers";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $num = $stmt->rowCount();
        return $num;
    }
    public function delete_service_type($id){
        try{
            $sql = "DELETE FROM service_type WHERE type_id =?";
            $stmt = $this->conn->prepare($sql);
            $res = $stmt->execute([$id]);
            // Execute the query
            if ($res) {
                echo 'success'; // Return success response
            } else {
                echo 'error'; // Return error response
            }
        }       catch(PDOException $e) {
            // Handle error if database connection fails
            echo 'error: ' . $e->getMessage();
        }
     }
     public function delete_customer($id){
        try{
            $sql = "DELETE FROM customers WHERE cust_id=?";
           $stmt= $this->conn->prepare($sql); // step1: prepare
            $res = $stmt->execute([$id]);
           if($res){
            $_SESSION['feedback'] = "Customer Deleted Successfully";
            return true;
            exit;
           }else{
            $_SESSION['adminerr'] = "Unable to Deleted Customer";
            return false;
            exit;
           }
        }catch(PDOException $e){
        //  echo $e->gerMessage(); 
        return false;
        }
    }
    public function delete_vendor($id){
        try{
            $sql = "DELETE FROM vendors WHERE vendor_id=?";
           $stmt= $this->conn->prepare($sql); // step1: prepare
            $res = $stmt->execute([$id]);
           if($res){
            $_SESSION['feedback'] = "vendor Deleted Successfully";
            return true;
            exit;
           }else{
            $_SESSION['adminerr'] = "Unable to Deleted Vendor";
            return false;
            exit;
           }
        }catch(PDOException $e){
        //  echo $e->gerMessage(); 
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
    public function update_service_status($id,$status){
        $sql = "UPDATE service_type SET status=? WHERE type_id=?";
        $stmt = $this->conn->prepare($sql);
        $res = $stmt->execute([$status,$id]);
        return $res;
    }
    
    public function fetch_services_type(){
        $sql = "SELECT * FROM service_type";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(); 
        $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $service;
    }
    public function fetch_services(){
        $sql = "SELECT * FROM services JOIN service_type ON services.type_id=service_type.type_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(); 
        $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $service;
    }
    public function add_all_services($tempname,$filename,$unique_name,$servicename,$servicesdesc){
        if(move_uploaded_file($tempname,$filename)){
        $sql = "INSERT INTO  service_type SET photoname=?, type_name= ?,sertype_desc=? ";
        $stmt = $this->conn->prepare($sql);
        $res = $stmt->execute([$unique_name,$servicename,$servicesdesc]);
        return $res;
            if($res){
                // $_SESSION['feedback'] = "Profile Picture Updated";
                // header('location:../vendorpage.php');
                // exit;
            }else{
                echo "File not Uploaded and Added";
            }
        }else{
            return "Unable to Upload";
        }
    }

    public function add_all_sub_service($servicename,  $servicetype ){
        $sql = "INSERT INTO services SET service_name =? , type_id = ?";
        $stmt = $this->conn->prepare($sql);
        $res = $stmt->execute([$servicename,  $servicetype ]);
        return $res;
    }
}
// $ser = new Admin;
// $chk = $ser->fetch_services();

// echo "<pre>";
// print_r($chk);
// echo "</pre>";
// exit;
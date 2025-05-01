<?php
        require_once "Db.php";
class Vendors extends Db{

    private $conn;
    public function __construct(){
            $this->conn = $this->connect();
    }
    public function logout(){
        unset($_SESSION['online']);
        session_destroy();
    }
 
 public function fetch_all_vendors(){
    $sql = "SELECT * FROM vendors";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(); 
    $vendor = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $vendor; //done
}

public function fetch_vendor_detail($id){
    $sql = "SELECT * FROM vendors WHERE vendor_id  = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    return $res;
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
public function delete_vendors($id){
    try{
        $sql = "DELETE FROM vendors WHERE vendor_id=?";
       $stmt= $this->conn->prepare($sql); // step1: prepare
       $check = $stmt->execute([$id]);
       return true; // step 2 : execute..

    }catch(PDOException $e){
    //  echo $e->gerMessage(); 
    return false;
    }
}


}
$vend = new Vendors;
$checks = $vend-> delete_vendors(13);
echo '<pre>';
print_r($checks);
echo '</pre>';









    
    
    
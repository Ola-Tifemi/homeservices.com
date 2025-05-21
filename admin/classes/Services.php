<?php
        require_once "Db.php";
class Services extends Db{

    private $conn;
    public function __construct(){
            $this->conn = $this->connect();
    }
    public function logout(){
        unset($_SESSION['useronline']);
        session_destroy();
    }
    public function fetch_service_detail($id){
        $sql = "SELECT * FROM service_type WHERE type_id  = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
 
 public function fetch_services_type(){
    $sql = "SELECT * FROM service_type";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(); 
    $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $service;
}

public function search_services($term) {
    $sql = "SELECT type_name FROM service_type WHERE type_name LIKE ? LIMIT 10";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(["%$term%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function fetch_services(){
    $sql = "SELECT * FROM services";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(); 
    $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $service;
}


public function add_all_services($servicename){
    $sql = "INSERT INTO  service_type SET type_name  = ?";
    $stmt = $this->conn->prepare($sql);
    $res = $stmt->execute([$servicename]);
    return $res;
}

public function add_all_sub_service($service_sub, $servictype){
    $sql = "INSERT INTO services SET service_name = ?, type_id = ?";
    $stmt = $this->conn->prepare($sql);
    $res = $stmt->execute([$service_sub, $servictype]);
    return $res;
}

}









    
    
    

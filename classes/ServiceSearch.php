<?php
    require_once "Db.php";
class ServiceSearch extends Db{
    private $conn;
    public function __construct(){
            $this->conn = $this->connect();
    }

    public function search_services($term) {
        try {
            $sql = "SELECT service_name, vendor_brandname, vendor_email, vendor_officenumber FROM services 
                    JOIN vendor_service ON services.service_id = vendor_service.service_id 
                    JOIN vendors ON vendor_service.vendor_id = vendors.vendor_id 
                    WHERE service_name LIKE ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["%$term%"]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }
    
    
}
// $services = new ServiceSearch ;
// $results = $services->search_services('cooking');
// print_r($results);
// exit;


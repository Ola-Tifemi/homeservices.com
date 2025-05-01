<?php
    require_once "Config.php";
    class Db{
        private $conn;
        private $dbname=DB_NAME;
        private $dbuser=DB_USER;
        private $dbpass=DB_PASS;
        private $dbhost=DB_HOST;
      
        
        //this method connects to the data base so any class that needs access to db can extend this clss
        public function connect(){
            $dsn="mysql:host=$this->dbhost;dbname=$this->dbname";//make sure theres no space here
            $options=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            
            try{
                $this->conn= new PDO($dsn,$this->dbuser,$this->dbpass,$options);//creating connection
                return $this->conn;//returning connection
            }catch(PDOException $e){
                // echo $e->getMessage();
                return false;
            }

        }



    }


//     $db1= new Db;
//    $connection= $db1->connect();

//     var_dump($connection);

?>
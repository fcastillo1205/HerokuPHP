<?php 
    class Database {
        private $host = "ec2-35-168-80-116.compute-1.amazonaws.com";
        private $database_name = "d61hs4tjfp8q4k";
        private $username = "epzhrcobjntjle";
        private $password = "ab87578d1e2b72a242708a14c54f27b519ab1a700b1641ab215e7f544bfcda3d";
        private $port = "5432";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("pgsql:host=" . $this->host . ";port=" . $this->port  . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
               
            }catch(PDOException $exception)
            {
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }  
    }
?>
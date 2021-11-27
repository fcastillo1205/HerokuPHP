<?php 
    class Database {
        private $host = "localhost";
        private $database_name = "id15605615_programacionweb2";
        private $username = "id15605615_localhost";
        private $password = "ProgramacionWeb_2";
        //private $port = "5432";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
               
            }catch(PDOException $exception)
            {
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }  
    }
?>
<?php
    class kardex{

        // Conexion
        private $conn;

        // Tabla
        private $db_table = "kardex";

        // Columnas
        public $id;
        public $fecha;
        public $descripcion;
        public $ID_articulo;
        public $entradas;
        public $salidas;
        public $precio;
        public $saldo;
        public $estado;
    

        public function __construct($db){
            $this->conn = $db;
        }

        public function getKardexs(){
            $sqlQuery = "SELECT id, fecha, descripcion, ID_articulo, entradas, salidas, precio, saldo, estado FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

         // READ single
         public function getKardex(){
            $sqlQuery = "SELECT
                        id, 
                        fecha, 
                        descripcion, 
                        ID_articulo, 
                        entradas, 
                        salidas, 
                        precio, 
                        saldo, 
                        estado
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            return $stmt;
          
        }  

        // Crear 
        public function createKardex(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                    fecha = :fecha, 
                    descripcion = :descripcion, 
                    ID_articulo = :ID_articulo,
                    entradas = :entradas,
                    salidas = :salidas,
                    precio = :precio,
                    saldo = :saldo,
                    estado = :estado";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            
            $this->fecha=htmlspecialchars(strip_tags($this->fecha));
            $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
            $this->ID_articulo=htmlspecialchars(strip_tags($this->ID_articulo));
            $this->entradas=htmlspecialchars(strip_tags($this->entradas));
            $this->salidas=htmlspecialchars(strip_tags($this->salidas));
            $this->precio=htmlspecialchars(strip_tags($this->precio));
            $this->saldo=htmlspecialchars(strip_tags($this->saldo));
            $this->estado=htmlspecialchars(strip_tags($this->estado));
          
        
            // bind data
            $stmt->bindParam(":fecha", $this->fecha);
            $stmt->bindParam(":descripcion", $this->descripcion);
            $stmt->bindParam(":ID_articulo", $this->ID_articulo);
            $stmt->bindParam(":entradas", $this->entradas);
            $stmt->bindParam(":salidas", $this->salidas);
            $stmt->bindParam(":precio", $this->precio);
            $stmt->bindParam(":saldo", $this->saldo);
            $stmt->bindParam(":estado", $this->estado);

            if($stmt->execute()){
               return true;
            }
            return false;
        }      

        // UPDATE
        public function updateKardex(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    fecha = :fecha, 
                    descripcion = :descripcion, 
                    ID_articulo = :ID_articulo,
                    entradas = :entradas,
                    salidas = :salidas,
                    precio = :precio,
                    saldo = :saldo,
                    estado = :estado
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
           
            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->fecha=htmlspecialchars(strip_tags($this->fecha));
            $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
            $this->ID_articulo=htmlspecialchars(strip_tags($this->ID_articulo));
            $this->entradas=htmlspecialchars(strip_tags($this->entradas));
            $this->salidas=htmlspecialchars(strip_tags($this->salidas));
            $this->precio=htmlspecialchars(strip_tags($this->precio));
            $this->saldo=htmlspecialchars(strip_tags($this->saldo));
            $this->estado=htmlspecialchars(strip_tags($this->estado));
            
        
            // bind data
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":fecha", $this->fecha);
            $stmt->bindParam(":descripcion", $this->descripcion);
            $stmt->bindParam(":ID_articulo", $this->ID_articulo);
            $stmt->bindParam(":entradas", $this->entradas);
            $stmt->bindParam(":salidas", $this->salidas);
            $stmt->bindParam(":precio", $this->precio);
            $stmt->bindParam(":saldo", $this->saldo);
            $stmt->bindParam(":estado", $this->estado);
         
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteKardex(){
           $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    estado = :estado
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
           
            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->estado=htmlspecialchars(strip_tags($this->estado));
            
        
            // bind data
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":estado", $this->estado);
         
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
    }
?>
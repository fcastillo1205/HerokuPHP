<?php
    class articulo{

        // Conexion
        private $conn;

        // Tabla
        private $db_table = "articulos";

        // Columnas
        public $id;
        public $nombre;
        public $descripcion;
        public $estado;
        public $precio;
        public $ID_bodega;
    

        // Constructor de clae
        public function __construct($db){
            $this->conn = $db;
        }

        // GET todas Las bodegas
        public function getArticulos(){
            $sqlQuery = "SELECT id, nombre, descripcion, precio, estado, ID_bodega FROM " . $this->db_table . "";
            //$stmt = $this->conn->prepare($sqlQuery);
            $stmt = pg_query($this->conn, $sqlQuery);
            //$stmt->execute();
            return $stmt;
        }

         // READ single
         public function getArticulo(){
            $sqlQuery = "SELECT
                        id, 
                        nombre, 
                        descripcion, 
                        precio,
                        estado,
                        ID_bodega
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
        public function createArticulo(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                    nombre = :nombre, 
                    descripcion = :descripcion, 
                    precio = :precio,
                    estado = :estado,
                    ID_bodega = :ID_bodega";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->nombre=htmlspecialchars(strip_tags($this->nombre));
            $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
            $this->precio=htmlspecialchars(strip_tags($this->precio));
            $this->estado=htmlspecialchars(strip_tags($this->estado));
            $this->ID_bodega=htmlspecialchars(strip_tags($this->ID_bodega));
          
        
            // bind data
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":descripcion", $this->descripcion);
            $stmt->bindParam(":precio", $this->precio);
            $stmt->bindParam(":estado", $this->estado);
            $stmt->bindParam(":ID_bodega", $this->ID_bodega);

            if($stmt->execute()){
               return true;
            }
            return false;
        }      

        // UPDATE
        public function updateArticulo(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    nombre = :nombre, 
                    descripcion = :descripcion, 
                    precio = :precio,
                    estado = :estado,
                    ID_bodega = :ID_bodega
                    WHERE 
                        id = :id";

            //echo $sqlQuery;
        
            $stmt = $this->conn->prepare($sqlQuery);
           
            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->nombre=htmlspecialchars(strip_tags($this->nombre));
            $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
            $this->precio=htmlspecialchars(strip_tags($this->precio));
            $this->estado=htmlspecialchars(strip_tags($this->estado));
            $this->ID_bodega=htmlspecialchars(strip_tags($this->ID_bodega));
            
        
            // bind data
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":descripcion", $this->descripcion);
            $stmt->bindParam(":precio", $this->precio);
            $stmt->bindParam(":estado", $this->estado);
            $stmt->bindParam(":ID_bodega", $this->ID_bodega);
         
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteArticulo(){
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
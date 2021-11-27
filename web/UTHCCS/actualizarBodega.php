<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once 'Database.php';
    include_once 'Bodega.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Bodega($db);
    
    //$data = json_decode(file_get_contents("php://input"));
    echo $_GET["id"];
    if(isset($_GET["id"]) && isset($_GET["nombre"]) && isset($_GET["descripcion"]) && isset($_GET["estado"])){
     
        $item->id = $_GET["id"];
        $item->nombre = $_GET["nombre"];
        $item->descripcion = $_GET["descripcion"];
        $item->estado = $_GET["estado"];
        
    }
    
    
  
    
    if($item->updateBodega()){
        echo "Bodega actualizada.";
    } else{
        echo "Bodega no actualizada";
    }
?>
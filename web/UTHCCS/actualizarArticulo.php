<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once 'Database.php';
    include_once 'articulo.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new articulo($db);

    if(isset($_GET["id"]) && isset($_GET["nombre"]) && isset($_GET["descripcion"]) && isset($_GET["precio"]) && isset($_GET["estado"])&& isset($_GET["ID_bodega"])){     
        $item->id = $_GET["id"];
        $item->nombre = $_GET["nombre"];
        $item->descripcion = $_GET["descripcion"];
        $item->precio = $_GET["precio"];
        $item->estado = $_GET["estado"];
        $item->ID_bodega = $_GET["ID_bodega"];
        
    }
    
    
  
    
    if($item->updateArticulo()){
        echo "Articulo actualizado.";
    } else{
        echo "Articulo no actualizado";
    }
?>
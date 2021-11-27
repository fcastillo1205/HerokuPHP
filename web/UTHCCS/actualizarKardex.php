<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once 'Database.php';
    include_once 'kardex.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new kardex($db);
    
    if(isset($_GET["id"]) 
        && isset($_GET["fecha"]) 
        && isset($_GET["descripcion"]) 
        && isset($_GET["ID_articulo"]) 
        && isset($_GET["entradas"]) 
        && isset($_GET["salidas"]) 
        && isset($_GET["precio"])
        && isset($_GET["saldo"])  
        && isset($_GET["estado"])){
     
        $item->id = $_GET["id"];
        $item->fecha = $_GET["fecha"];
        $item->descripcion = $_GET["descripcion"];
        $item->ID_articulo = $_GET["ID_articulo"];
        $item->entradas = $_GET["entradas"];
        $item->salidas = $_GET["salidas"];
        $item->precio = $_GET["precio"];
        $item->saldo = $_GET["saldo"];
        $item->estado = $_GET["estado"];
        
    }
    
    
  
    
    if($item->updatekardex()){
        echo "Kardex actualizado";
    } else{
        echo "Kardex no actualizado";
    }
?>
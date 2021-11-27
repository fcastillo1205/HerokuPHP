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

   if(isset($_GET["id"])){
    $item->id = $_GET["id"];
    $item->estado = $_GET["estado"];

   }
    
   
    
    if($item->deleteKardex()){
        echo "Kardex eliminado";
    } else{
        echo "no se pudo eliminar Kardex";
    }
?>
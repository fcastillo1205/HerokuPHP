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

   if(isset($_GET["id"])){
    $item->id = $_GET["id"];
   }
    
   
    
    if($item->deleteArticulo()){
        echo json_encode("Articulo eliminado.");
    } else{
        echo json_encode("no se pudo eliminar Articulo");
    }
?>
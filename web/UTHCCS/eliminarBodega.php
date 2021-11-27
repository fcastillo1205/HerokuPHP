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
    
   // $data = json_decode(file_get_contents("php://input"));
   if(isset($_GET["id"])){
    $item->id = $_GET["id"];
   }
    
   
    
    if($item->deleteBodega()){
        echo json_encode("Bodega eliminada.");
    } else{
        echo json_encode("no se pudo eliminar bodega");
    }
?>
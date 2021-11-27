<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'Database.php';
    include_once 'Bodega.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Bodega($db);

    if(isset($_GET["id"])){
        $items->id = $_GET["id"];

        $stmt = $items->getBodega();
        $itemCount = $stmt->rowCount();

        if($itemCount > 0){
        
            $employeeArr = array();
            $employeeArr["bodega"] = array();
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $e = array(
                    "id" => $id,
                    "nombre" => $nombre,
                    "descripcion" => $descripcion,
                    "estado" => $estado
                );
                array_push($employeeArr["bodega"], $e);
            }
            echo json_encode($employeeArr);
        }
    
        else{
            http_response_code(404);
            echo json_encode(
                array("message" => "No record found.")
            );
        }

    }
    
?>
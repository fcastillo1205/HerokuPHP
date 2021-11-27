<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'Database.php';
    include_once 'articulo.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new articulo($db);

    if(isset($_GET["id"])){
        $items->id = $_GET["id"];

        $stmt = $items->getArticulo();
        $itemCount = $stmt->rowCount();

        if($itemCount > 0){
        
            $articuloArray = array();
            $articuloArray["articulo"] = array();
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $e = array(
                    "id" => $id,
                    "nombre" => $nombre,
                    "descripcion" => $descripcion,
                    "estado" => $estado
                );
                array_push($articuloArray["articulo"], $e);
            }
            echo json_encode($articuloArray);
        }
    
        else{
            http_response_code(404);
            echo json_encode(
                array("message" => "No record found.")
            );
        }

    }
    
?>
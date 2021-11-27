<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'Database.php';
    include_once 'articulo.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new articulo($db);

    $stmt = $items->getArticulos();
    $itemCount = $stmt->rowCount();


   
    if($itemCount > 0){
        
        $articulosArray = array();
        $articulosArray["articulos"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "precio" =>  $precio,
                "estado" => $estado,
                "ID_bodega" => $ID_bodega
            );

            array_push($articulosArray["articulos"], $e);
        }
        echo json_encode($articulosArray);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
    
?>
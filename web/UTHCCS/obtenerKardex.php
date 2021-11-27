<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'Database.php';
    include_once 'kardex.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new kardex($db);

    if(isset($_GET["id"])){
        $items->id = $_GET["id"];

        $stmt = $items->getkardex();
        $itemCount = $stmt->rowCount();

        if($itemCount > 0){
        
            $kardexArray = array();
            $kardexArray["kardex"] = array();
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $e = array(
                    "id" => $id,
                    "fecha" => $fecha,
                    "descripcion" => $descripcion,
                    "ID_articulo" => $ID_articulo,
                    "entradas" => $entradas,
                    "salidas" => $salidas,
                    "precio" => $precio,
                    "saldo" => $saldo,
                    "estado" => $estado
                );
                array_push($kardexArray["kardex"], $e);
            }
            echo json_encode($kardexArray);
        }
    
        else{
            http_response_code(404);
            echo json_encode(
                array("message" => "No record found.")
            );
        }

    }
    
?>
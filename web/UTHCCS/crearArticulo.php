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
   
    if(isset($_GET["nombre"]) && isset($_GET["descripcion"]) && isset($_GET["precio"]) && isset($_GET["estado"]) && isset($_GET["ID_bodega"])){
		$nombre=$_GET['nombre'];
		$descripcion=$_GET['descripcion'];
        $precio=$_GET['precio'];
		$estado=$_GET['estado'];
        $ID_bodega=$_GET['ID_bodega'];

        $item->nombre =$nombre;
        $item->descripcion = $descripcion;
        $item->precio = $precio;
        $item->estado = $estado;
        $item->ID_bodega = $ID_bodega;
    }
   
    
    if($item->createArticulo()){
        echo 'Articulo creado.';
    } else{
        echo 'Articulo no creado.';
    }
?>
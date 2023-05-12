<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once("../../modelo/daoProductos.php");
include_once("../../modelo/productos.php");

$conn = new Conexion();
$db   = $conn->getConn();
$crud = new DAOproductos($db);


$stmt = $crud->read_productos();

if($stmt->rowCount()>0){
     $array_producto =  array();
    // $array_articulo['body'] = array();
     while( $row=$stmt->fetch(PDO::FETCH_ASSOC) ){
         extract($row);
         $producto = array(
            "id_producto"=>$id_producto,
            "cve_producto"=>$cve_producto,
            "nombre"=>$nombre,
            "precio"=>$precio,
            "cantidad"=>$cantidad,
            "img_nombre"=>$img_nombre,
            "img_ruta"=>$img_ruta,
            "id_material_fk"=>$id_material_fk
         );
            array_push($array_producto,$producto);
     }//while
     echo json_encode($array_producto);
}else{
  http_response_code(404);
  echo json_encode("sin resultados");
}
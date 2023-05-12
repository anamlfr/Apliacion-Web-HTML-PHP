<?php
//librerias
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

$id_producto = 
isset($_GET['id_producto'])?$_GET['id_producto']:die();

$stmt = $crud->read_producto($id_producto);

if($stmt->rowCount()>0){
     
     if( $row=$stmt->fetch(PDO::FETCH_ASSOC) ){
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
         echo json_encode($producto);       
     }//if
     
}else{
  http_response_code(404);
  echo json_encode("sin resultados");
}
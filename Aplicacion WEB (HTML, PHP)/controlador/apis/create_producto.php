<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once('../../modelo/productos.php');
include_once("../../modelo/daoProductos.php");

$conn      = new Conexion();
$db        = $conn->getConn();
$crud      = new DAOproductos($db);
$producto  = new Productos('','','','','','','','');

$data = json_decode(file_get_contents("php://input"));
$producto->id_producto = 0;
$producto->cve_producto = $data->cve_producto;
$producto->nombre = $data->nombre;
$producto->precio = $data->precio;
$producto->cantidad = $data->cantidad;
$producto->img_nombre = $data->img_nombre;
$producto->img_ruta = $data->img_ruta;
$producto->id_material_fk = $data->id_material_fk;

   $mensaje=  $crud->create_producto($producto)?"ok":"mal"; 
 echo $mensaje;  
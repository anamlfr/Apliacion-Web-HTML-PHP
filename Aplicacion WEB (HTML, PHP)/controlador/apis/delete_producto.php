<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once('../../modelo/productos.php');
include_once("../../modelo/daoProductos.php");

$conn     = new Conexion();
$db       = $conn->getConn();
$crud     = new DAOproductos($db);
$producto = new Productos("","","","","","","","");

$data = json_decode(file_get_contents("php://input"));
$producto->id_producto = $data->id_producto;
$mensaje = 
$crud->delete_producto($producto)?"BAJA":"ERROR";
echo $mensaje;
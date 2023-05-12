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

$id_producto = 
isset($_GET['id_producto'])?$_GET['id_producto']:die();

$m = $crud->delete_producto($id_producto)
      ?"borrado":"mal";

echo $m;
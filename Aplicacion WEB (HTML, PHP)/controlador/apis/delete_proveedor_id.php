<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once("../../modelo/daoProveedores.php");
include_once("../../modelo/proveedores.php");

$conn = new Conexion();
$db   = $conn->getConn();
$crud = new DAOproveedores($db);

$id_proveedor = 
isset($_GET['id_proveedor'])?$_GET['id_proveedor']:die();

$m = $crud->delete_proveedor($id_proveedor)
      ?"borrado":"mal";

echo $m;
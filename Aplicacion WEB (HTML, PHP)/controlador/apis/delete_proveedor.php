<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once('../../modelo/proveedores.php');
include_once("../../modelo/DAOproveedores.php");

$conn     = new Conexion();
$db       = $conn->getConn();
$crud     = new DAOproveedores($db);
$articulo = new Proveedores("","","","","","","","","");

$data = json_decode(file_get_contents("php://input"));
$proveedor->id_proveedor = $data->id_proveedor;
$mensaje = 
$crud->delete_proveedor($proveedor)?"BAJA":"ERROR";
echo $mensaje;
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once('../../modelo/proveedores.php');
include_once("../../modelo/DAOproveedores.php");

$conn = new Conexion();
$db   = $conn->getConn();
$crud = new DAOproveedores($db);
$proveedor    = new Proveedores('','','','','','','','','');

$data = json_decode(file_get_contents("php://input"));
$proveedor->id_proveedor = 0;
$proveedor->nombre = $data->nombre;
$proveedor->apellido_p = $data->apellido_p;
$proveedor->apellido_m = $data->apellido_m;
$proveedor->direccion = $data->direccion;
$proveedor->cod_postal = $data->cod_postal;
$proveedor->telefono = $data->telefono;
$proveedor->razon_social = $data->razon_social;
$proveedor->rfc = $data->rfc;
   $mensaje=  $crud->create_proveedor($proveedor)?"ok":"mal"; 
 echo $mensaje;  
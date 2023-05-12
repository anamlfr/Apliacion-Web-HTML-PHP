<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once('../../modelo/material.php');
include_once("../../modelo/DAOmaterial.php");

$conn     = new Conexion();
$db       = $conn->getConn();
$crud     = new DAOmaterial($db);
$material = new Material("","","","");

$data = json_decode(file_get_contents("php://input"));
$material->id_material = $data->id_material;
$mensaje = 
$crud->delete_material($material)?"BAJA":"ERROR";
echo $mensaje;
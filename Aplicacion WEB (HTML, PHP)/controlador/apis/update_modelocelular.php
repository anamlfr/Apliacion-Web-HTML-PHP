<?php
//librerias
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once('../../modelo/modelo_celular.php');
include_once("../../modelo/daoModelocelular.php");

$conn       = new Conexion();
$db         = $conn->getConn();
$crud       = new DAOmodelocelular($db);
$modelocel   = new Modelocelular('','','');

$data = json_decode(file_get_contents("php://input"));
$modelocel->id_modelo_celular = $data->id_modelo_celular;
$modelocel->modelo_celular = $data->modelo_celular;
$modelocel->id_producto_fk = $data->id_producto_fk;
   $mensaje=  $crud->update_modelocelular($modelocel)?"ok modi":"mal modi"; 
 echo $mensaje;  
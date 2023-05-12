<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once("../../modelo/daoModelocelular.php");
include_once("../../modelo/modelo_celular.php");

$conn = new Conexion();
$db   = $conn->getConn();
$crud = new DAOmodelocelular($db);

$id_modelo_celular = 
isset($_GET['id_modelo_celular'])?$_GET['id_modelo_celular']:die();

$m = $crud->delete_modelocelular($id_modelo_celular)
      ?"borrado":"mal";

echo $m;
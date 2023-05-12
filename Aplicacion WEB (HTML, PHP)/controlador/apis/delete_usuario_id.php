<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once("../../modelo/daoUsuario.php");
include_once("../../modelo/usuario.php");

$conn = new Conexion();
$db   = $conn->getConn();
$crud = new DAOusuario($db);

$id_usuario = 
isset($_GET['id_usuario'])?$_GET['id_usuario']:die();

$m = $crud->delete_usuario($id_usuario)
      ?"borrado":"mal";

echo $m;
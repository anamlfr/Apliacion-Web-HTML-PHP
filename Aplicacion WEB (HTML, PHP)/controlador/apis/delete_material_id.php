<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once("../../modelo/daoMaterial.php");
include_once("../../modelo/material.php");

$conn = new Conexion();
$db   = $conn->getConn();
$crud = new DAOmaterial($db);

$id_material = 
isset($_GET['id_material'])?$_GET['id_material']:die();

$m = $crud->delete_material($id_material)
      ?"borrado":"mal";

echo $m;
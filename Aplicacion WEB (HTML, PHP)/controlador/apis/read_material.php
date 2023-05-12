<?php
//librerias
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

$stmt = $crud->read_material($id_material);

if($stmt->rowCount()>0){
     
     if( $row=$stmt->fetch(PDO::FETCH_ASSOC) ){
         extract($row);
         $material = array(
            "id_material"=>$id_material,
            "tipo_material"=>$tipo_material,
            "cantidad"=>$cantidad,
            "id_proveedor_fk"=>$id_proveedor_fk
         );
         echo json_encode($material);       
     }//if
     
}else{
  http_response_code(404);
  echo json_encode("sin resultados");
}
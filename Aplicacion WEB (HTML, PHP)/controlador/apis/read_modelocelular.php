<?php
//librerias
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

$stmt = $crud->read_modelocelular($id_modelo_celular);

if($stmt->rowCount()>0){
     
     if( $row=$stmt->fetch(PDO::FETCH_ASSOC) ){
         extract($row);
         $modelocel = array(
            "id_modelo_celular"=>$id_modelo_celular,
            "modelo_celular"=>$modelo_celular,
            "id_producto_fk"=>$id_producto_fk
         );
         echo json_encode($modelocel);       
     }//if
     
}else{
  http_response_code(404);
  echo json_encode("sin resultados");
}
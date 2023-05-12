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


$stmt = $crud->read_modelocelulares();

if($stmt->rowCount()>0){
     $array_modelocel =  array();
    // $array_articulo['body'] = array();
     while( $row=$stmt->fetch(PDO::FETCH_ASSOC) ){
         extract($row);
         $modelocel = array(
            "id_modelo_celular"=>$id_modelo_celular,
            "modelo_celular"=>$modelo_celular,
            "id_producto_fk"=>$id_producto_fk
         );
            array_push($array_modelocel,$modelocel);
     }//while
     echo json_encode($array_modelocel);
}else{
  http_response_code(404);
  echo json_encode("sin resultados");
}
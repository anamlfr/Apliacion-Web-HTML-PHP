<?php
//librerias
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once("../../modelo/daoProveedores.php");
include_once("../../modelo/proveedores.php");

$conn = new Conexion();
$db   = $conn->getConn();
$crud = new DAOproveedores($db);

$id_proveedor = 
isset($_GET['id_proveedor'])?$_GET['id_proveedor']:die();

$stmt = $crud->read_proveedor($id_proveedor);

if($stmt->rowCount()>0){
     
     if( $row=$stmt->fetch(PDO::FETCH_ASSOC) ){
         extract($row);
         $proveedor = array(
            "id_proveedor"=>$id_proveedor,
            "nombre"=>$nombre,
            "apellido_p"=>$apellido_p,
            "apellido_m"=>$apellido_m,
            "direccion"=>$direccion,
            "cod_postal"=>$cod_postal,
            "telefono"=>$telefono,
            "razon_social"=>$razon_social,
            "rfc"=>$rfc
         );
         echo json_encode($proveedor);       
     }//if
     
}else{
  http_response_code(404);
  echo json_encode("sin resultados");
}
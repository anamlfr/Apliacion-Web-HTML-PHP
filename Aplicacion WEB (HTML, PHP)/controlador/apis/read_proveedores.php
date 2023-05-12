<?php
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


$stmt = $crud->read_proveedores();

if($stmt->rowCount()>0){
     $array_proveedor =  array();
    // $array_articulo['body'] = array();
     while( $row=$stmt->fetch(PDO::FETCH_ASSOC) ){
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
            array_push($array_proveedor,$proveedor);
     }//while
     echo json_encode($array_proveedor);
}else{
  http_response_code(404);
  echo json_encode("sin resultados");
}
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


$stmt = $crud->read_usuarios();

if($stmt->rowCount()>0){
     $array_usuario =  array();
    // $array_articulo['body'] = array();
     while( $row=$stmt->fetch(PDO::FETCH_ASSOC) ){
         extract($row);
         $usuario = array(
            "id_usuario"=>$id_usuario,
            "nombre"=>$nombre,
            "apellido_p"=>$apellido_p,
            "apellido_m"=>$apellido_m,
            "telefono"=>$telefono,
            "correo"=>$correo,
            "contrasena"=>$contrasena,
            "perfil"=>$perfil
         );
            array_push($array_usuario,$usuario);
     }//while
     echo json_encode($array_usuario);
}else{
  http_response_code(404);
  echo json_encode("sin resultados");
}
<?php
//librerias
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

$stmt = $crud->read_usuario($id_usuario);

if($stmt->rowCount()>0){
     
     if( $row=$stmt->fetch(PDO::FETCH_ASSOC) ){
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
         echo json_encode($usuario);       
     }//if
     
}else{
  http_response_code(404);
  echo json_encode("sin resultados");
}
<?php
//librerias
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../modelo/conexion.php");
include_once('../../modelo/usuario.php');
include_once("../../modelo/DAOusuario.php");

$conn = new Conexion();
$db   = $conn->getConn();
$crud = new DAOusuario($db);
$usuario    = new Usuario('','','','','','','','');

$data = json_decode(file_get_contents("php://input"));
$usuario->id_usuario = $data->id_usuario;
$usuario->nombre = $data->nombre;
$usuario->apellido_p = $data->apellido_p;
$usuario->apellido_m = $data->apellido_m;
$usuario->telefono = $data->telefono;
$usuario->correo = $data->correo;
$usuario->contrasena = $data->contrasena;
$usuario->perfil = $data->perfil;
   $mensaje=  $crud->update_usuario($usuario)?"ok modi":"mal modi"; 
 echo $mensaje;  
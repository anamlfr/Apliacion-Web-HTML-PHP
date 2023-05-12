<?php

class DAOusuario{
    public $conn;

    public function __construct ($db){
        $this->conn = $db;
    }//constructor;

    public function create_usuario($usuario){
        $sql ="INSERT INTO usuario(
            nombre, apellido_p, apellido_m, telefono, correo, contrasena, perfil)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $usuario->nombre          = htmlspecialchars(strip_tags($usuario->nombre));
        $usuario->apellido_p      = htmlspecialchars(strip_tags($usuario->apellido_p));
        $usuario->apellido_m      = htmlspecialchars(strip_tags($usuario->apellido_m));
        $usuario->telefono        = htmlspecialchars(strip_tags($usuario->telefono));
        $usuario->correo          = htmlspecialchars(strip_tags($usuario->correo));
        $usuario->contrasena      = htmlspecialchars(strip_tags($usuario->contrasena));
        $usuario->perfil          = htmlspecialchars(strip_tags($usuario->perfil));

        $stmt->bindParam(1,$usuario->nombre);
        $stmt->bindParam(2,$usuario->apellido_p);
        $stmt->bindParam(3,$usuario->apellido_m);
        $stmt->bindParam(4,$usuario->telefono);
        $stmt->bindParam(5,$usuario->correo);
        $stmt->bindParam(6,$usuario->contrasena);
        $stmt->bindParam(7,$usuario->perfil);

          if($stmt->execute())
            return true;
        else 
              return false;
          
    }//create

    public function read_usuario($id_usuario){
        $sql = "select * from usuario where id_usuario=$id_usuario";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }//leer solo un usuario
    public function read_usuarios(){
        $sql = "select * from usuario ";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }


    public function update_usuario($usuario){
        $sql ="update usuario SET 
        nombre         = :nombre,
        apellido_p     = :apellido_p,
        apellido_m     = :apellido_m,
        telefono       = :telefono,
        correo         = :correo,
        contrasena     = :contrasena,
        perfil         = :perfil
        where id_usuario    = :id_usuario ";
        $stmt = $this->conn->prepare($sql);
        $usuario->nombre          = htmlspecialchars(strip_tags($usuario->nombre));
        $usuario->apellido_p      = htmlspecialchars(strip_tags($usuario->apellido_p));
        $usuario->apellido_m      = htmlspecialchars(strip_tags($usuario->apellido_m));
        $usuario->telefono        = htmlspecialchars(strip_tags($usuario->telefono));
        $usuario->correo          = htmlspecialchars(strip_tags($usuario->correo));
        $usuario->contrasena      = htmlspecialchars(strip_tags($usuario->contrasena));
        $usuario->perfil          = htmlspecialchars(strip_tags($usuario->perfil));

        $stmt->bindParam(":id_usuario",$usuario->id_usuario);
        $stmt->bindParam(":nombre",$usuario->nombre);
        $stmt->bindParam(":apellido_p",$usuario->apellido_p);
        $stmt->bindParam(":apellido_m",$usuario->apellido_m);
        $stmt->bindParam(":telefono",$usuario->telefono);
        $stmt->bindParam(":correo",$usuario->correo);
        $stmt->bindParam(":contrasena",$usuario->contrasena);
        $stmt->bindParam(":perfil",$usuario->perfil);
       
        if($stmt->execute())
            return true;
        else 
              return false;
          
    }//create


    public function delete_usuario($id_usuario){
        $sql = "delete from usuario where id_usuario=$id_usuario";
        $stmt= $this->conn->prepare($sql);
         if($stmt->execute())
           return true;
        else
           return false;
    
    }//eliminar
}//clase
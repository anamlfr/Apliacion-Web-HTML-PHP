<?php

class DAOproveedores{
    public $conn;

    public function __construct ($db){
        $this->conn = $db;
    }//constructor;

    public function create_proveedor($proveedor){
        $sql ="INSERT INTO proveedores(
            nombre, apellido_p, apellido_m, direccion, cod_postal, telefono, razon_social, rfc)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $proveedor->nombre          = htmlspecialchars(strip_tags($proveedor->nombre));
        $proveedor->apellido_p      = htmlspecialchars(strip_tags($proveedor->apellido_p));
        $proveedor->apellido_m      = htmlspecialchars(strip_tags($proveedor->apellido_m));
        $proveedor->direccion       = htmlspecialchars(strip_tags($proveedor->direccion));
        $proveedor->cod_postal      = htmlspecialchars(strip_tags($proveedor->cod_postal));
        $proveedor->telefono        = htmlspecialchars(strip_tags($proveedor->telefono));
        $proveedor->razon_social    = htmlspecialchars(strip_tags($proveedor->razon_social));
        $proveedor->rfc             = htmlspecialchars(strip_tags($proveedor->rfc));

        $stmt->bindParam(1,$proveedor->nombre);
        $stmt->bindParam(2,$proveedor->apellido_p);
        $stmt->bindParam(3,$proveedor->apellido_m);
        $stmt->bindParam(4,$proveedor->direccion);
        $stmt->bindParam(5,$proveedor->cod_postal);
        $stmt->bindParam(6,$proveedor->telefono);
        $stmt->bindParam(7,$proveedor->razon_social);
        $stmt->bindParam(8,$proveedor->rfc);

          if($stmt->execute())
            return true;
        else 
              return false;
          
    }//create

    public function read_proveedor($id_proveedor){
        $sql = "select * from proveedores where id_proveedor=$id_proveedor";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }//leer solo un proveedor
    public function read_proveedores(){
        $sql = "select * from proveedores ";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }


    public function update_proveedor($proveedor){
        $sql ="update proveedores SET 
        nombre         = :nombre,
        apellido_p     = :apellido_p,
        apellido_m     = :apellido_m,
        direccion      = :direccion,
        cod_postal     = :cod_postal,
        telefono       = :telefono,
        razon_social   = :razon_social,
        rfc            = :rfc
        where id_proveedor    = :id_proveedor ";
        $stmt = $this->conn->prepare($sql);
        $proveedor->nombre          = htmlspecialchars(strip_tags($proveedor->nombre));
        $proveedor->apellido_p      = htmlspecialchars(strip_tags($proveedor->apellido_p));
        $proveedor->apellido_m      = htmlspecialchars(strip_tags($proveedor->apellido_m));
        $proveedor->direccion       = htmlspecialchars(strip_tags($proveedor->direccion));
        $proveedor->cod_postal      = htmlspecialchars(strip_tags($proveedor->cod_postal));
        $proveedor->telefono        = htmlspecialchars(strip_tags($proveedor->telefono));
        $proveedor->razon_social    = htmlspecialchars(strip_tags($proveedor->razon_social));
        $proveedor->rfc             = htmlspecialchars(strip_tags($proveedor->rfc));

        $stmt->bindParam(":id_proveedor",$proveedor->id_proveedor);
        $stmt->bindParam(":nombre",$proveedor->nombre);
        $stmt->bindParam(":apellido_p",$proveedor->apellido_p);
        $stmt->bindParam(":apellido_m",$proveedor->apellido_m);
        $stmt->bindParam(":direccion",$proveedor->direccion);
        $stmt->bindParam(":cod_postal",$proveedor->cod_postal);
        $stmt->bindParam(":telefono",$proveedor->telefono);
        $stmt->bindParam(":razon_social",$proveedor->razon_social);
        $stmt->bindParam(":rfc",$proveedor->rfc);
       
        if($stmt->execute())
            return true;
        else 
              return false;
          
    }//create


    public function delete_proveedor($id_proveedor){
        $sql = "delete from proveedores where id_proveedor=$id_proveedor";
        $stmt= $this->conn->prepare($sql);
         if($stmt->execute())
           return true;
        else
           return false;
    
    }//leer solo un proveedor
}//clase
<?php

class DAOmodelocelular{
    public $conn;

    public function __construct ($db){
        $this->conn = $db;
    }//constructor;

    public function create_modelocelular($modelocel){
        $sql ="INSERT INTO modelo_celular(
            modelo_celular, id_producto_fk)
            VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $modelocel->modelo_celular   = htmlspecialchars(strip_tags($modelocel->modelo_celular));

        $stmt->bindParam(1,$modelocel->modelo_celular);
        $stmt->bindParam(2,$modelocel->id_producto_fk);

          if($stmt->execute())
            return true;
        else 
              return false;
          
    }//create

    public function read_modelocelular($id_modelo_celular){
        $sql = "select * from modelo_celular where id_modelo_celular=$id_modelo_celular";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }//leer solo un modelocel
    public function read_modelocelulares(){
        $sql = "select * from modelo_celular ";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }


    public function update_modelocelular($modelocel){
        $sql ="update modelo_celular SET 
        modelo_celular              = :modelo_celular,
        id_producto_fk              = :id_producto_fk
        where id_modelo_celular     = :id_modelo_celular ";
        $stmt = $this->conn->prepare($sql);
        $modelocel->modelo_celular  = htmlspecialchars(strip_tags($modelocel->modelo_celular));

        $stmt->bindParam(":id_modelo_celular",$modelocel->id_modelo_celular);
        $stmt->bindParam(":modelo_celular",$modelocel->modelo_celular);
        $stmt->bindParam(":id_producto_fk",$modelocel->id_producto_fk);
       
        if($stmt->execute())
            return true;
        else 
              return false;
          
    }//create


    public function delete_modelocelular($id_modelo_celular){
        $sql = "delete from modelo_celular where id_modelo_celular=$id_modelo_celular";
        $stmt= $this->conn->prepare($sql);
         if($stmt->execute())
           return true;
        else
           return false;
    
    }//eliminar
}//clase
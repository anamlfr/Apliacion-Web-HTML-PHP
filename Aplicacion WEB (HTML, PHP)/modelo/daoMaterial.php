<?php

class DAOmaterial{
    public $conn;

    public function __construct ($db){
        $this->conn = $db;
    }//constructor;

    public function create_material($material){
        $sql ="INSERT INTO material(
            tipo_material, cantidad, id_proveedor_fk)
            VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $material->tipo_material   = htmlspecialchars(strip_tags($material->tipo_material));
        $material->cantidad        = htmlspecialchars(strip_tags($material->cantidad));

        $stmt->bindParam(1,$material->tipo_material);
        $stmt->bindParam(2,$material->cantidad);
        $stmt->bindParam(3,$material->id_proveedor_fk);

          if($stmt->execute())
            return true;
        else 
              return false;
          
    }//create

    public function read_material($id_material){
        $sql = "select * from material where id_material=$id_material";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }//leer solo un material
    public function read_materiales(){
        $sql = "select * from material ";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }


    public function update_material($material){
        $sql ="update material SET 
        tipo_material        = :tipo_material,
        cantidad             = :cantidad,
        id_proveedor_fk      = :id_proveedor_fk
        where id_material    = :id_material ";
        $stmt = $this->conn->prepare($sql);
        $material->tipo_material  = htmlspecialchars(strip_tags($material->tipo_material));
        $material->cantidad       = htmlspecialchars(strip_tags($material->cantidad));

        $stmt->bindParam(":id_material",$material->id_material);
        $stmt->bindParam(":tipo_material",$material->tipo_material);
        $stmt->bindParam(":cantidad",$material->cantidad);
        $stmt->bindParam(":id_proveedor_fk",$material->id_proveedor_fk);
       
        if($stmt->execute())
            return true;
        else 
              return false;
          
    }//create


    public function delete_material($id_material){
        $sql = "delete from material where id_material=$id_material";
        $stmt= $this->conn->prepare($sql);
         if($stmt->execute())
           return true;
        else
           return false;
    
    }//eliminar
}//clase
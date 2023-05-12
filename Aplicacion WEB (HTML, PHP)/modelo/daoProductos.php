<?php

class DAOproductos
{
    public $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    } //constructor;

    public function create_producto($producto)
    {
        $sql = "INSERT INTO productos(
            cve_producto, nombre, precio, cantidad, img_nombre, img_ruta, id_material_fk)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $producto->cve_producto = htmlspecialchars(strip_tags($producto->cve_producto));
        $producto->nombre       = htmlspecialchars(strip_tags($producto->nombre));
        $producto->precio       = htmlspecialchars(strip_tags($producto->precio));
        $producto->cantidad     = htmlspecialchars(strip_tags($producto->cantidad));
        $producto->img_nombre   = htmlspecialchars(strip_tags($producto->img_nombre));
        $producto->img_ruta     = htmlspecialchars(strip_tags($producto->img_ruta));

        $stmt->bindParam(1,$producto->cve_producto);
        $stmt->bindParam(2,$producto->nombre);
        $stmt->bindParam(3,$producto->precio);
        $stmt->bindParam(4,$producto->cantidad);
        $stmt->bindParam(5,$producto->img_nombre);
        $stmt->bindParam(6,$producto->img_ruta);
        $stmt->bindParam(7,$producto->id_material_fk);
        if ($stmt->execute())
            return true;
        else
            return false;
    } //create

    public function read_producto($id_producto)
    {
        $sql = "select * from productos where id_producto=$id_producto";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    } //leer solo un producto
    public function read_productos()
    {
        $sql = "select * from productos ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }


    public function update_producto($producto)
    {
        $sql = "update productos SET 
        cve_producto        = :cve_producto,
        nombre              = :nombre,
        precio              = :precio,
        cantidad            = :cantidad,
        img_nombre          = :img_nombre,
        img_ruta            = :img_ruta,
        id_material_fk      = :id_material_fk
        where id_producto    = :id_producto ";
        $stmt = $this->conn->prepare($sql);
        $producto->cve_producto = htmlspecialchars(strip_tags($producto->cve_producto));
        $producto->nombre       = htmlspecialchars(strip_tags($producto->nombre));
        $producto->precio       = htmlspecialchars(strip_tags($producto->precio));
        $producto->cantidad     = htmlspecialchars(strip_tags($producto->cantidad));
        $producto->img_nombre   = htmlspecialchars(strip_tags($producto->img_nombre));
        $producto->img_ruta     = htmlspecialchars(strip_tags($producto->img_ruta));

        $stmt->bindParam(":id_producto", $producto->id_producto);
        $stmt->bindParam(":cve_producto", $producto->cve_producto);
        $stmt->bindParam(":nombre", $producto->nombre);
        $stmt->bindParam(":precio", $producto->precio);
        $stmt->bindParam(":cantidad", $producto->cantidad);
        $stmt->bindParam(":img_nombre", $producto->img_nombre);
        $stmt->bindParam(":img_ruta", $producto->img_ruta);
        $stmt->bindParam(":id_material_fk", $producto->id_material_fk);


        if ($stmt->execute())
            return true;
        else
            return false;
    } //create


    public function delete_producto($id_producto)
    {
        $sql = "delete from productos where id_producto=$id_producto";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute())
            return true;
        else
            return false;
    } //eliminar
}//clase
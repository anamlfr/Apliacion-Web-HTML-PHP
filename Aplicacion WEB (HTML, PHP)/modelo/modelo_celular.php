<?php

class Modelocelular{
    public $id_modelo_celular;
    public $modelo_celular;
    public $id_producto_fk;

    public function __construct(
        $id_modelo_celular,
        $modelo_celular,
        $id_producto_fk
    )
    {
        $this->id_modelo_celular  = $id_modelo_celular;
        $this->modelo_celular     = $modelo_celular;
        $this->id_producto_fk     = $id_producto_fk;
    }//constructor

    public function getId_modelo_celular()
    {
        return $this->id_modelo_celular;
    } 
    public function setId_modelo_celular($id_modelo_celular)
    {
        $this->id_modelo_celular = $id_modelo_celular;
    }
 
    public function getModelo_celular()
    {
        return $this->modelo_celular;
    }
    public function setModelo_celular($modelo_celular)
    {
        $this->modelo_celular = $modelo_celular;
    }

    public function getId_producto_fk()
    {
        return $this->id_producto_fk;
    } 
    public function setId_producto_fk($id_producto_fk)
    {
        $this->id_producto_fk = $id_producto_fk;
    }
}
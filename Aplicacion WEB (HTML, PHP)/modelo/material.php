<?php

class Material{
    public $id_material;
    public $tipo_material;
    public $cantidad;
    public $id_proveedor_fk;

    public function __construct(
        $id_material,
        $tipo_material,
        $cantidad,
        $id_proveedor_fk
    )
    {
        $this->id_material      = $id_material;
        $this->tipo_material    = $tipo_material;
        $this->cantidad         = $cantidad;
        $this->id_proveedor_fk  = $id_proveedor_fk;  
    }//constructor

    public function getId_material()
    {
        return $this->id_material;
    }
    public function setId_material($id_material)
    {
        $this->id_material = $id_material;
    }

    public function getTipo_material()
    {
        return $this->tipo_material;
    }
    public function setTipo_material($tipo_material)
    {
        $this->tipo_material = $tipo_material;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getId_proveedor_fk()
    {
        return $this->id_proveedor_fk;
    }
    public function setId_proveedor_fk($id_proveedor_fk)
    {
        $this->id_proveedor_fk = $id_proveedor_fk;
    }
}
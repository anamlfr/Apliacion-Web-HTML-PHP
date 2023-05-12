<?php

class Productos{
    public $id_producto;
    public $cve_producto;
    public $nombre;
    public $precio;
    public $cantidad;
    public $img_nombre;
    public $img_ruta;
    public $id_material_fk;

    public function __construct(
        $id_producto,
        $cve_producto,
        $nombre,
        $precio,
        $cantidad,
        $img_nombre,
        $img_ruta,
        $id_material_fk
    )
    {
        $this->id_producto     = $id_producto;
        $this->cve_producto    = $cve_producto;
        $this->nombre          = $nombre;
        $this->precio          = $precio;
        $this->cantidad        = $cantidad;
        $this->img_nombre      = $img_nombre;
        $this->img_ruta        = $img_ruta;
        $this->id_material_fk  = $id_material_fk;
        
    }//constructor

    public function getId_producto()
    {
        return $this->id_producto;
    }
    public function setId_producto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getImg_nombre()
    {
        return $this->img_nombre;
    } 
    public function setImg_nombre($img_nombre)
    {
        $this->img_nombre = $img_nombre;
    }

    public function getImg_ruta()
    {
        return $this->img_ruta;
    }
    public function setImg_ruta($img_ruta)
    {
        $this->img_ruta = $img_ruta;
    }

    public function getId_material_fk()
    {
        return $this->id_material_fk;
    } 
    public function setId_material_fk($id_material_fk)
    {
        $this->id_material_fk = $id_material_fk;
    }

    public function getCve_producto()
    {
        return $this->cve_producto;
    }
    public function setCve_producto($cve_producto)
    {
        $this->cve_producto = $cve_producto;
    }
}
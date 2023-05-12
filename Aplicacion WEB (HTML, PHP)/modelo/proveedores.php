<?php

class Proveedores{
    public $id_proveedor;
    public $nombre;
    public $apellido_p;
    public $apellido_m;
    public $direccion;
    public $cod_postal;
    public $telefono;
    public $razon_social;
    public $rfc;

    public function __construct(
        $id_proveedor,
        $nombre,
        $apellido_p,
        $apellido_m,
        $direccion,
        $cod_postal,
        $telefono,
        $razon_social,
        $rfc
    )
    {
        $this->id_proveedor     = $id_proveedor;
        $this->nombre           = $nombre;
        $this->apellido_p       = $apellido_p;
        $this->apellido_m       = $apellido_m;
        $this->direccion        = $direccion;
        $this->cod_postal       = $cod_postal;
        $this->telefono         = $telefono;
        $this->razon_social     = $razon_social;
        $this->rfc              = $rfc;
        
    }//constructor

    public function getId_proveedor()
    {
        return $this->id_proveedor;
    }
    public function setId_proveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
    }

    
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


    public function getApellido_p()
    {
        return $this->apellido_p;
    }
    public function setApellido_p($apellido_p)
    {
        $this->apellido_p = $apellido_p;
    }

    public function getApellido_m()
    {
        return $this->apellido_m;
    }
    public function setApellido_m($apellido_m)
    {
        $this->apellido_m = $apellido_m;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getCod_postal()
    {
        return $this->cod_postal;
    }
    public function setCod_postal($cod_postal)
    {
        $this->cod_postal = $cod_postal;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getRazon_social()
    {
        return $this->razon_social;
    }
    public function setRazon_social($razon_social)
    {
        $this->razon_social = $razon_social;
    }

    public function getRfc()
    {
        return $this->rfc;
    }
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;
    }
}
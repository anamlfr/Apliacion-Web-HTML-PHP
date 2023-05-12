<?php

class Usuario
{
    public $id_usuario;
    public $nombre;
    public $apellido_p;
    public $apellido_m;
    public $telefono;
    public $contrasena;
    public $perfil;

    public function __construct(
        $id_usuario,
        $nombre,
        $apellido_p,
        $apellido_m,
        $telefono,
        $contrasena,
        $perfil
    ) {
        $this->id_usuario   = $id_usuario;
        $this->nombre       = $nombre;
        $this->apellido_p   = $apellido_p;
        $this->apellido_m   = $apellido_m;
        $this->telefono     = $telefono;
        $this->contrasena   = $contrasena;
        $this->perfil       = $perfil;
    } //constructor

    public function getId_usuario()
    {
        return $this->id_usuario;
    }
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
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

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }
}

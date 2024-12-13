<?php
class contacto
{
    private $id;
    private $nombre;
    private $apellido;
    private $numero;
    private $idUsuario;
    private $foto;
    public function __construct($id, $nombre, $apellido, $numero, $idUsuario, $foto)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numero = $numero;
        $this->idUsuario = $idUsuario;
        $this->foto = $foto;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }

    public function getNumero()
    {
        return $this->numero;
    }
    public function getidUsuario()
    {
        return $this->idUsuario;
    }

    public function getFoto()
    {
        return $this->foto;
    }
}

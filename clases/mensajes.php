<?php
class mensaje
{
    private $id;
    private $idContacto;
    private $mensaje;
    private $fecha;

    public function __construct($id, $idContacto, $mensaje, $fecha)
    {
        $this->id = $id;
        $this->idContacto =  $idContacto;
        $this->mensaje = $mensaje;
        $this->fecha = $fecha;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getIdContacto()
    {
        return $this->idContacto;
    }
    public function getMensaje()
    {
        return $this->mensaje;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
}

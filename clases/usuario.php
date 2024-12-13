<?php
class Usuario
{
    private $numero;
    private $password;
    private $avatar;
    private $id;
    public function __construct($id, $numero, $password, $avatar)
    {
        $this->id = $id;
        $this->numero = $numero;
        $this->password = $password;
        $this->avatar = $avatar;
    }
    public function getID()
    {
        return $this->id;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }
}

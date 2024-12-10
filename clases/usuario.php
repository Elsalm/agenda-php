<?php
class Usuario
{
    private $numero;
    private $password;
    private $avatar;

    public function __construct($numero, $password, $avatar)
    {
        $this->numero = $numero;
        $this->password = $password;
        $this->avatar = $avatar;
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

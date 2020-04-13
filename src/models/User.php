<?php

class User extends Model
{
    private $login;
    private $email;
    private $password;
    private $name;

    public function __construct($login, $password, $email = null,  $name = null)
    {
        $this->setLogin($login);
        $this->setPassword($password);
        $this->setEmail($email);
        $this->setName($name);
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($value)
    {
        $this->login = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value)
    {
        $this->password = password_hash($value, PASSWORD_BCRYPT);
    }

    public function getName()
    {
        return $this->password;
    }

    public function setName($value)
    {
        $this->name = $value;
    }
}

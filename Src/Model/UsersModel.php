<?php

namespace App\Src\Model;

use DateTime;

class UsersModel extends Models
{
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password;
    protected $create_at;
    public function __construct()
    {
        $this->table = 'user';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword(string $password)
    {
        $this->password = $password;
        return $password;
    }
    public function getCreateAt()
    {
        return $this->create_at;
    }
    public function setCreateAt(DateTime $create_at)
    {
        $this->create_at = $create_at;
        return $this;
    }
}

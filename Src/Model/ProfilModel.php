<?php

namespace App\Src\Model;

class ProfilModel extends Models
{
    protected $id;
    protected $illustration;
    protected $pseudo;
    protected $id_user;

    public function __construct()
    {
        $this->table = "profil";
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

    public function getIllustration()
    {
        return $this->illustration;
    }

    public function setIllustration(string $illustration)
    {
        $this->illustration = $illustration;
        return $this;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }
}

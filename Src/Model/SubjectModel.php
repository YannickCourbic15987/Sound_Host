<?php

namespace App\Src\Model;

use DateTime;

class SubjectModel extends Models
{
    protected $id;
    protected $title;
    protected $create_at;
    protected $id_profil;
    protected $id_category;

    public function __construct()
    {
        $this->table = "subject";
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
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
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
    public function getProfilId()
    {
        return $this->id_profil;
    }
    public function setProfilId(int $id_profil)
    {
        $this->id_profil = $id_profil;
        return $this;
    }
    public function setCategoryId(int $id_category)
    {
        $this->id_category = $id_category;
        return $this;
    }
}

<?php

namespace App\Src\Model;

class CategoryModel extends Models
{
    protected $id;
    protected $title;
    protected $logo;
    public function __construct()
    {
        $this->table = 'category';
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

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo(string $logo)
    {
        $this->logo = $logo;
        return $this;
    }
}

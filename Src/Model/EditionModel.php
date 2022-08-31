<?php

namespace App\Src\Model;

class EditionModel extends Models
{
    protected $id;
    protected $title;

    public function __construct()
    {
        $this->table = "edition";
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
}

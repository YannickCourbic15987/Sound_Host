<?php

namespace App\Src\Model;

use DateTime;

class SubjectDetailsModel extends Models
{
    protected $id;
    protected $pseudo;
    protected $illustration;
    protected $title;
    protected $category;
    protected $created_at;

    public function __construct()
    {
        $this->table = "subject_details";
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

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
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
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }
    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(string $category)
    {
        $this->category = $category;
        return $this;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function setCreatedAt(DateTime $created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }
}

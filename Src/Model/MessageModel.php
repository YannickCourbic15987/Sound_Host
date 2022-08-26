<?php

namespace App\Src\Model;

use DateTime;

class MessageModel extends Models
{
    protected $id;
    protected $text;
    protected $id_category;
    protected $id_profil;
    protected $id_subject;
    protected $publication;
    public function __construct()
    {
        $this->table = 'message';
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

    public function getText()
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }

    public function getIdCategory()
    {
        return $this->id_category;
    }

    public function setIdCategory(int $id_category)
    {
        $this->id_category = $id_category;
        return $this;
    }

    public function getIdProfil()
    {
        return $this->id_profil;
    }

    public function setIdProfil($id_profil)
    {
        $this->id_profil = $id_profil;
        return $this;
    }

    public function getIdSubject()
    {
        return $this->id_subject;
    }

    public function setIdSubject(int $id_subject)
    {
        $this->id_subject = $id_subject;
        return $this;
    }

    public function getPublication()
    {
        return $this->publication;
    }

    public function setPublication(DateTime $publication)
    {
        $this->publication = $publication;
        return $this;
    }
}

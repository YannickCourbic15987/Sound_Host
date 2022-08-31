<?php

namespace App\Src\Model;

class LibraryModel extends Models
{
    protected $id;
    protected $title;
    protected $description;
    protected $picture;
    protected $publication;
    protected $id_category;
    protected $id_edition;
    protected $price;

    public function __construct()
    {
        $this->table = "library";
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

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture(string $picture)
    {
        $this->picture = $picture;
        return $this;
    }

    public function getPublication()
    {
        return $this->publication;
    }

    public function setPublication(string $publication)
    {
        $this->publication = $publication;
        return $this;
    }

    public function getIdCategory()
    {
        return $this->id_category;
    }

    public function setIdCategory(string $id_category)
    {
        $this->id_category = $id_category;
        return $this;
    }

    public function getIdEdition()
    {
        return $this->id_edition;
    }

    public function setIdEdition(string $id_edition)
    {
        $this->id_edition = $id_edition;
        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}

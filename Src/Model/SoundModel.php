<?php

namespace App\Src\Model;

class SoundModel extends Models
{

    protected $id;
    protected $title;
    protected $image;
    protected $sound;
    protected $description;
    protected $releaseDate;
    protected $category;

    public function __construct()
    {
        $this->table = 'sound';
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
        return $this;
    }

    public function getSound(): string
    {
        return $this->sound;
    }

    public function setSound(string $sound)
    {
        $this->sound = $sound;
        return $this;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
        return $this;
    }

    public function getCategory(): int
    {
        return $this->category;
    }

    public function setCategory(int $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }
}

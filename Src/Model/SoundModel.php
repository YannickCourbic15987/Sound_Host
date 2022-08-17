<?php

namespace App\Src\Model;

class SoundModel
{
    public function __construct(
        private $id,
        private $title,
        private $image,
        private $sound,
        private $description,
        private $releaseDate,
        private $category
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getSound(): string
    {
        return $this->sound;
    }

    public function setSound(string $sound)
    {
        $this->sound = $sound;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(string $sound)
    {
        $this->sound = $sound;
    }

    public function getCategory(): int
    {
        return $this->category;
    }

    public function setCategory(int $category)
    {
        $this->category = $category;
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

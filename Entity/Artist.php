<?php

namespace App\Entity;

class Artist extends Model
{
    

    public function __construct(
        public string|null $id_artist,

        public string|null $name,

        public int|null    $followers,

        public array|null  $genders,

        public string|null $link,

        public string|null $picture,
        public int|null $id = null
    )
    {
        $this->table = "artist";
    }

    public function getId(): ?string
    {
        return $this->id_artist;
    }

    public function setId(string $id_artist): self
    {
        $this->id_artist = $id_artist;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setFollowers(int $followers): self
    {
        $this->followers = $followers;
        return $this;
    }

    public function getFollowers(): ?int
    {
        return $this->followers;
    }

    public function getGenders(): ?array
    {
        return $this->genders;
    }

    public function setGenders(array $genders): self
    {
        $this->genders = $genders;
        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }


    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }
}
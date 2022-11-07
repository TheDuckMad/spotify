<?php

namespace App\Entity;

class Track
{

    public function __construct(
        public string|null $id,

        public string|null $name,

        public int|null    $track_number,

        public string|null  $preview_url,

        public array|null $artists
    )
    {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
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

    public function getTrackNumber(): ?int
    {
        return $this->track_number;
    }

    public function setTrackNumber(int $track_number): self
    {
        $this->track_number = $track_number;
        return $this;
    }    

    public function getPreviewUrl(): ?string
    {
        return $this->preview_url;
    }

    public function setPreviewUrl(string $preview_url): self
    {
        $this->preview_url = $preview_url;
        return $this;
    }

    public function getArtists(): ?array
    {
        return $this->artists;
    }

    public function setArtists(string $artists): self
    {
        $this->artists = $artists;
        return $this;
    }
}
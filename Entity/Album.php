<?php

namespace App\Entity;
use App\Entity\Track;

class Album 
{
    public string|null $id;

    public function __construct(
        public string|null $id_album,

        public string|null $name,

        public string|null    $release_date,

        public int|null  $total_tracks,

        public string|null $picture,

        public array|null $tracks
    )
    {
        $this->table = "album";
    }

    public function getId(): ?string
    {
        return $this->id_album;
    }

    public function setId(string $id_album): self
    {
        $this->id_album = $id_album;
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

    public function getReleaseDate(): ?string
    {
        return $this->release_date;
    }

    public function setReleaseDate(string $release_date): self
    {
        $this->release_date = $release_date;
        return $this;
    }    

    public function getTotalTracks(): ?string
    {
        return $this->total_tracks;
    }

    public function setTotalTracks(string $total_tracks): self
    {
        $this->total_tracks = $total_tracks;
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

    public function getTracks(): ?array
    {
        return $this->tracks;
    }

    public function setTracks(array $tracks): self
    {
        $this->tracks = $tracks;
        return $this;
    }

    // public function addTrack(Track track)
    // {
    //     array_push($this->tracks, track);
    // }

    // public removeTrack(Track track) 
    // {
    //     $this->tracks = array_diff($this->tracks, track);
    // }
}
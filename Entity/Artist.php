<?php
namespace App\Entity;
class Artist{

    public function __construct(
        public string|null $id,
        public string|null $name,
        public int|null $followers,
        public array|null $genders = [],
        public string|null $link,
        public string|null $picture,){
    }

    public function getId(): string {
        return $this->id;
    }
    
    public function setId(string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getName(): string {
        return $this->name;
    }
    
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }
    
    public function getFollowers(): int {
        return $this->followers;
    }
    
    public function setFollowers(string $followers): self {
        $this->followers = $followers;
        return $this;
    }
    
    public function getGenders(): array {
        return $this->genders;
    }
    
    public function setGenders(string $genders): self {
        $this->genders = $genders;
        return $this;
    }
    
    public function getLink(): string {
        return $this->link;
    }
    
    public function setLink(string $link): self {
        $this->link = $link;
        return $this;
    }
    
    public function getPicture(): ?string {
        return $this->picture;
    }
    
    public function setPicture(string $picture): self {
        $this->picture = $picture;
        return $this;
    }

    public function display(): void{
        echo (
            '<div class=col-md-4>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src=' . $this->getPicture() . 'alt="Image d album">
                    <div class="card-body">
                        <h5 class="card-title">Name : ' . $this->getName() . '</h5>
                        <p class="card-text">Followers : ' . $this->getFollowers() .'</p>
                        <p class="card-text">Id : ' . $this->getId() .'</p>
                        <p class="card-text">Link : ' . $this->getLink() .'</p>
                        <p class="card-text">Genres : ' . $this->getGenders() . '</p>
                    </div>
                </div>
            </div>');
    }
}
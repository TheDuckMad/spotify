<?php

use App\Autoloader;
use App\Entity\Artist;

?>

<h1 class="my-5"> Pas mal d'artiste </h1>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



<form class="d-flex searchform mb-4" action="/artist/index/" method="get">
    <input class="form-control searchbar" type="search" placeholder="Search" aria-label="Search" name="name">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<div class="row">
    <?php
        foreach ($artists as $artist):
    ?>

    <div class='col-md-4'>
        <a href="/artist/profil/?id=<?= $artist->getId() ?>">
            <div class="card mb-5" style="width: 18rem;">
                <div>
                    <?php if ($artist->getPicture() !== null) :?>
                        <img class="card-img-top" src='<?= $artist->getPicture()?>' alt="Image d'album">
                    <?php else : ?>
                        <img class="card-img-top" src='https://i.scdn.co/image/ab6761610000e5eb51767bb5e3e3add66699344b' alt="Image par défaut">
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Name : <?= $artist->getName()?></h5>
                    <p class="card-text">Followers : <?= $artist->getFollowers()?></p>
                    <p class="card-text">Genres : 
                        <?php 
                        if (count($artist->getGenders()) === 0) {
                            echo 'Aucun';
                        } else { 
                            foreach($artist->getGenders() as $key => $gender) {
                                if ($key === 0) 
                                    echo $gender;
                                echo ', ' . $gender;
                            }
                        } ?>
                    </p>
                    <form class="d-flex searchform mb-4" action="/artist/addFavArtist" method="post">  
                        <input name='artist' type='hidden' value='<?= json_encode($artist) ?>'>                      
                        <button class="btn btn-outline-success" type="submit">Favori</button>
                    </form>            
                </div>
            </div>
        </a>
    </div>
            
    <?php endforeach ?>    
</div>


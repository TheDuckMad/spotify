<?php

use App\Autoloader;
use App\Entity\Artist;
use App\Entity\Album;

?>

<h1 class="my-5"><?= $artist->getName()?></h1>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="row">
    <?php
        foreach ($albums as $album):
    ?>

    
    <div class='col-md-4'>
        <a href="/artist/track/?id=<?= $album->getId() ?>">
            <div class="card mb-5" style="width: 18rem;">
                <div>
                    <?php if ($album->getPicture() !== null) :?>
                        <img class="card-img-top" src='<?= $album->getPicture()?>' alt="Image d'album">
                    <?php else : ?>
                        <img class="card-img-top" src='https://i.scdn.co/image/ab6761610000e5eb51767bb5e3e3add66699344b' alt="Image par défaut">
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Name : <?= $album->getName()?></h5>
                    <p class="card-text">Date de sortie : <?= $album->getReleaseDate()?></p>
                    <p class="card-text">Total tracks : <?= $album->getTotalTracks()?></p>
                    <form class="d-flex searchform mb-4" action="/artist/addFavAlbum" method="post">  
                        <input name='album' type='hidden' value='<?= json_encode($album) ?>'>                      
                        <button class="btn btn-outline-success" type="submit">Favori</button>
                    </form>     
                </div>
            </div>
        </a>
    </div>

    <?php endforeach ?>      
</div>


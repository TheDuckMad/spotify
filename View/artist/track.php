<?php

use App\Autoloader;
use App\Entity\Artist;
use App\Entity\Album;

?>

<h1 class="my-5"><?= $album->getName()?></h1>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



<div>
    <ul class="list-group">
    <?php foreach($album->getTracks() as $tracks): ?>
        <li class="list-group-item"><?= $tracks->track_number . ' ' . $tracks->name; ?></li>
    <?php endforeach; ?>
    </ul>
</div>



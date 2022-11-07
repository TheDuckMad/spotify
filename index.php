<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php
session_save_path('/Auth-Spotify.php');

use App\Entity\Artist;
use App\Autoloader;

require_once 'Autoloader.php';
require 'Auth-Spotify.php';
Autoloader::register();

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=Eminem&type=artist&limit=50");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
curl_close($ch);
$jsondecode = json_decode($result);
$artists = [];
foreach ($jsondecode->artists->item as $value):
    $artist = new Artist($value->id,$value->name,$value->followers->total,$value->genres,$value->external_urls->spotify,$value->images[0]->url);
    $artists[]=$artist;
?>

<?php endforeach 

?>


<div class="row"><?php
    foreach ($artists as $values){
        echo $values->display();
    }
?>
    
</div>
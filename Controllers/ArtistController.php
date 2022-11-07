<?php
namespace App\Controllers;
use App\Entity\Artist;
use App\Entity\Album;
use App\Entity\Track;

class ArtistController extends Controller
{
    public function index()
    {
        $name='PNL';
        if(isset($_GET['name'])) {
            $name=$_GET['name'];
        }      
        
        $jsondecode =  $this->useAPI("https://api.spotify.com/v1/search?q=$name&type=artist");
        $artists=[];

        foreach ($jsondecode->artists->items as $value) {
            $artist = new Artist($value->id,$value->name,$value->followers->total,$value->genres,$value->external_urls->spotify,$value->images[0]->url);
            $artists[]=$artist;
        }

        $this->render('artist/index', compact('artists'));
    }

    public function profil() {
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
        }

        $artist_value = $this->useAPI("https://api.spotify.com/v1/artists/$id");
        $artist = new Artist($artist_value->id,$artist_value->name,$artist_value->followers->total,$artist_value->genres,$artist_value->external_urls->spotify,$artist_value->images[0]->url);

        $album_value = $this->useAPI("https://api.spotify.com/v1/artists/$id/albums");
        $albums = [];

        foreach($album_value->items as $value_album) {
            if ($value_album->album_type === 'album') {     
                $album = new Album($value_album->id, $value_album->name, $value_album->release_date, $value_album->total_tracks, $value_album->images[0]->url, null);
                $albums[] = $album;
            }
        }       

        $this->render('artist/profil', compact('artist', 'albums'));
    }

    public function track() {
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
        }

        $track_value = $this->useAPI("https://api.spotify.com/v1/albums/$id/tracks");      
        $tracks = [];
        
        foreach($track_value->items as $value_track) {
            $track = new Track($value_track->id ,$value_track->name ,$value_track->track_number ,$value_track->preview_url ,$value_track->artists);
            $tracks[] = $track;
        }
    
        $album = new Album($value_album->id, $value_album->name, $value_album->release_date, $value_album->total_tracks, $value_album->images[0]->url, $tracks);        
        $this->render('artist/track', compact('album'));
    }

    public function fav_artist() {
        if (isset($_POST['artist'])) {
            $value = json_decode($_POST['artist']);
            $artist = new Artist($value->id_artist,$value->name,$value->followers,$value->genders,$value->link,$value->picture);       
            //ajout dans la bd
            $artist->create();
        }       

        //display depuis la bd
        $artists=[];
        $artists_bd = new Artist(null,null,null,null,null,null);
        $artists_bd = $artists_bd->findAll();

        foreach ($artists_bd as $value) {
            $artist = new Artist($value->id_artist,$value->name,$value->followers,json_decode($value->genders),$value->link,$value->picture,$value->id);
            $artists[]=$artist;  
        }      

        $this->render('artist/fav_artist', compact('artists'));
    }

    public function delete_artist($id) {
        $artists_bd = new Artist(null,null,null,null,null,null);
        $artists_bd->delete($id);
        $this->fav_artist();
    }

    public function fav_album() {
        if (isset($_POST['album'])) {
            $value = json_decode($_POST['album']);
        }
        $album = new Album($value_album->id, $value_album->name, $value_album->release_date, $value_album->total_tracks, $value_album->images[0]->url, null);
       
        var_dump($value);

        //ajout dans la bd
        $album->create();
        //display depuis la base
        $this->render('artist/fav_album', compact('album'));
    }

    public function useAPI($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); 
        curl_close($ch);
        $jsondecode = json_decode($result);

        return $jsondecode;
    }
}
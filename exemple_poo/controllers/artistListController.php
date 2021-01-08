<?php
include '../src/Connexion.php';
include '../models/ArtistModel.php';

$title = 'Liste d\'artistes';
$style = '../assets/css/style.css';
$script = '../assets/js/script.js';
$discList = 'discList.php';
$artistList = 'artistList.php';

// instanciation de l'objet (classe) ArtistModel
$artist = new ArtistModel();
// appel de la méthode getArtist de l'objet ArtistModel
$artList = $artist->getArtist();

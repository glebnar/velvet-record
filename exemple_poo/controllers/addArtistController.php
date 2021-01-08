<?php
include '../src/Connexion.php';

$title = 'Liste d\'artistes';
$style = '../assets/css/style.css';
$script = '../assets/js/script.js';
$discList = 'discList.php';
$artistList = 'artistList.php';

// décclaration d'un tableau d'erreur
$formError = [];
// déclaration des regex
$textRegex = '/^[\w]+$/';
$yearRegex = '/^[\d]{4}$/';

if (isset($_POST['submit'])) {
    include '../models/ArtistModel.php';
    $artist = new Artist();
    if (!empty($_POST['artist_name'])) {
        // si la donnée passe la regex
        if (preg_match($textRegex, $_POST['artist_name'])) {
            // stockage de la donnée dans l'objet disc
            $artist->artist_name = htmlspecialchars($_POST['artist_name']);
        } else {
            // message d'erreur
            $formError['artist_name'] = 'Erreur dans la saisie du titre';
        }
    } else {
        // message d'erreur
        $formError['artist_name'] = 'Ce champs est manquant';
    }
    if (count($formError) === 0) {
        // instanciation de l'objet DiscModel
        $addArtist = new ArtistModel();
        // si le retour de la méthode addDisc est false
        if(!$addArtist->addArtist($artist)) { // on passe en paramêtre de la méthode l'objet disc qui comprend à présent les données du formulaire
            // message d'erreur
            $formError['addArtist'] = 'L\'artiste n\'a pas pu être ajouté.';
        }
    }

}
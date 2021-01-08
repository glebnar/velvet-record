<?php
// import des fichier de connexion à la  base et model de la table artist
include '../src/Connexion.php';
include '../models/ArtistModel.php';
// déclaration de variable permettant l'affichage et la navigation sur le site
$title = 'Ajout d\'un disque';
$style = '../assets/css/style.css';
$script = '../assets/js/script.js';
$discList = 'discList.php';
$artistList = 'artistList.php';
// décclaration d'un tableau d'erreur
$formError = [];
// déclaration des regex
$textRegex = '/^[\w]+$/';
$yearRegex = '/^[\d]{4}$/';
// instanciation de l'objet (classe) ArtistModel
$artist = new ArtistModel();
// appel de la méthode getArtist de l'objet ArtistModel
$artList = $artist->getArtist();
// si le formulaire est soumis
if (isset($_POST['submit'])) {
    // import du model DiscModel
    include '../models/DiscModel.php';
    // instancition de l'objet Disc, accessible via la classe DsicModel (création d'un nouvel objet disc)
    $disc = new Disc();
    // si le champs est vide
    if (!empty($_POST['disc_title'])) {
        // si la donnée passe la regex
        if (preg_match($textRegex, $_POST['disc_title'])) {
            // stockage de la donnée dans l'objet disc
            $disc->disc_title = htmlspecialchars($_POST['disc_title']);
        } else {
            // message d'erreur
            $formError['disc_title'] = 'Erreur dans la saisie du titre';
        }
    } else {
        // message d'erreur
        $formError['disc_title'] = 'Ce champs est manquant';
    }

    if (!empty($_POST['disc_label'])) {
        if (preg_match($textRegex, $_POST['disc_label'])) {
            $disc->disc_label = htmlspecialchars($_POST['disc_label']);
        } else {
            $formError['disc_label'] = 'Erreur dans la saisie du titre';
        }
    } else {
        $formError['disc_label'] = 'Ce champs est manquant';
    }

    if (!empty($_POST['disc_price'])) {
        if (preg_match($textRegex, $_POST['disc_price'])) {
            $disc->disc_price = htmlspecialchars($_POST['disc_price']);
        } else {
            $formError['disc_price'] = 'Erreur dans la saisie du titre';
        }
    } else {
        $formError['disc_price'] = 'Ce champs est manquant';
    }

    if (!empty($_POST['disc_year'])) {
        if (preg_match($yearRegex, $_POST['disc_year'])) {
            $disc->disc_year = htmlspecialchars($_POST['disc_year']);
        } else {
            $formError['disc_year'] = 'Erreur dans la saisie du titre';
        }
    } else {
        $formError['disc_year'] = 'Ce champs est manquant';
    }

    if (!empty($_POST['disc_genre'])) {
        if (preg_match($textRegex, $_POST['disc_genre'])) {
            $disc->disc_genre = htmlspecialchars($_POST['disc_genre']);
        } else {
            $formError['disc_genre'] = 'Erreur dans la saisie du titre';
        }
    } else {
        $formError['disc_genre'] = 'Ce champs est manquant';
    }

    if (!empty($_POST['disc_artist'])) {
        if (preg_match($textRegex, $_POST['disc_artist'])) {
            $disc->artist_id = htmlspecialchars($_POST['disc_artist']);
        } else {
            $formError['disc_artist'] = 'Erreur dans la saisie du titre';
        }
    } else {
        $formError['disc_artist'] = 'Ce champs est manquant';
    }
// s'il n'y a pas d'erreur dans le tableau d'erreur
    if (count($formError) === 0) {
        // instanciation de l'objet DiscModel
        $addDisc = new DiscModel();
        // si le retour de la méthode addDisc est false
        if(!$addDisc->addDisc($disc)) { // on passe en paramêtre de la méthode l'objet disc qui comprend à présent les données du formulaire
            // message d'erreur
            $formError['addDisc'] = 'Le disque n\'a pas pu être ajouté.';
        }
    }
}

/**
 * $disc est un objet, les données qu'il y a à l'intérieur sont :
 * - $disc->disc_title
 * - $disc->year
 * - $disc->label
 * etc ...
 */

<?php
// import de fichier
include '../src/Connexion.php';
include '../models/DiscModel.php';
// déclaration de variable permettant l'affichage et la navigation sur le site
$title = 'Liste des disques';
$style = '../assets/css/style.css';
$script = '../assets/js/script.js';
$discList = 'discList.php';
$artistList = 'artistList.php';

// instanciation de l'objet DiscModel
$disc = new DiscModel();
// appel de la méthode getAllDisc de l'objet (classe) discModel
$list = $disc->getAllDisc();

if (isset($_POST['delete_submit'])) {
  $deleteDisc=$disc->deleteDisc($_POST["delete_disc"]);
  header("Location: discList.php");

}

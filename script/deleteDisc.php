<?php 
require "../connection bdd/connection_BDD.php" ;

$disc_id=$_GET['disc_id'];

//construction de la requête DELETE sans injection SQL

$requete = $db->prepare("DELETE from disc WHERE disc_id=:disc_id");

//$requete->bindValue(':sta_nom', $nom_station, PDO::PARAM_STR);
//$requete->bindValue(':sta_altitude', $altitude_station, PDO::PARAM_INT);
$requete->bindValue(':disc_id', $disc_id, PDO::PARAM_INT);

$requete->execute();

//libère la connection au serveur de BDD
$requete->closeCursor();

//redirection vers index.php
header("Location: ../index.php");




?>
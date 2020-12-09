<?php

$listArtist= "SELECT * FROM artist";
$resultArtist= $db->query($listArtist);

if (!$resultArtist) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2]; 
    die("Erreur dans la requête");
}

if ($resultArtist->rowCount() == 0) 
{
   // Pas d'enregistrement
   die("La table est vide");
}
?>
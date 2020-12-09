<?php
$disc_id=$_GET['disc_id'];

$requete = "SELECT *, artist_name FROM disc join artist on disc.artist_id=artist.artist_id where disc_id=$disc_id";
$result = $db->query($requete);

if (!$result) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2]; 
    die("Erreur dans la requête");
}

if ($result->rowCount() == 0) 
{
   // Pas d'enregistrement
   die("La table est vide");
}
$row = $result->fetch(PDO::FETCH_OBJ)
?>
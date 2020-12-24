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
$row = $result->fetch(PDO::FETCH_OBJ);
if(!empty($_POST['supprimer'])) {

    $disc_id=$_POST['supprimer_id'];

    //construction de la requête DELETE sans injection SQL
    
    $requete = $db->prepare("DELETE from disc WHERE disc_id=:disc_id");
    
    $requete->bindValue(':disc_id', $disc_id, PDO::PARAM_INT);
    
    $requete->execute();
    
    //libère la connection au serveur de BDD
    $requete->closeCursor();
    
    //redirection vers index.php
    header("Location: index.php");
    
    
    
}
?>
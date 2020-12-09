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
// Tableau contenant les messages d'erreur lies a la validation de chaque 
// champ du formulaire.
// On utilisera le nom du champ comme cle du tableau
$errs = array();


// S'il s'agit du premier affichage, le bouton submit n'a pas ete presse
// il n'y a pas de validation a effectuer. Sinon $_POST["submit"] n'est pas
// vide (et contient la valeur "Enregistrer")
if(isset($_POST["submit"])){
    if (strlen($_POST["submit"]) > 0) {
        $disc_title = $_POST["disc_title"];
        $artist_id=$_POST['artist_id'];
        $disc_year=$_POST['disc_year'];
        $disc_label=$_POST['disc_label'];
        $disc_genre=$_POST['disc_genre'];
        $disc_price=$_POST['disc_price'];
        $disc_picture=$_FILES["disc_picture"]["name"];


            $erreur_file=$_FILES["disc_picture"]["error"];
            // ----------------------------------------------------------
            $aMimeTypes = array("image/gif", "image/jpeg", "image/png");
            
            if ($erreur_file==4){
                $errs["disc_picture"][] ="aucun fichier image n'a été ajouté";
            }
            if ($erreur_file==0){
                
                    // On extrait le type du fichier via l'extension FILE_INFO 
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mimetype = finfo_file($finfo, $_FILES["disc_picture"]["tmp_name"]);
                    finfo_close($finfo);
                
                    if (!in_array($mimetype, $aMimeTypes)){
                        // Le type n'est pas autorisé, donc ERREUR
                            
                        $errs["disc_picture"][] ="le fichier envoyé n'est pas un fichier image valide (gif/jpeg/png)";
                    }
                
            }


        if (preg_match("#^[a-zA-Z0-9]+#",$disc_title)==0){
            $errs["disc_title"][] ="titre non valide, vérifiez la saisie";
        }

        if (preg_match("#^[a-zA-Z0-9,]+#",stripSlashes($_POST["disc_genre"]))==0){
            $errs["disc_genre"][] ="Genre non valide, vérifiez la saisie";
        }

        if (preg_match("#^[a-zA-Z0-9]+#",stripSlashes($_POST["disc_label"]))==0){
            $errs["disc_label"][] ="label non valide, vérifiez la saisie";
        }

        if (preg_match("#^[0-9]{4,4}#",stripSlashes($_POST["disc_year"]))==0){
            $errs["disc_year"][] ="année non valide, vérifiez la saisie ( ex: 1984)";
        }


        if (!is_numeric(stripSlashes($_POST["disc_price"]))){
            $errs["disc_price"][] ="entrez une valeur numérique pour le prix";
        
        }
        if (count($errs) == 0) {
            // Les donnees du formulaires ont ete validee (pas d'erreur trouvee)
            $requete = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_label, disc_genre, disc_price,disc_picture, artist_id) 
            VALUES (:disc_title,:disc_year,:disc_label,:disc_genre,:disc_price,:disc_picture,:artist_id)");

                $requete->bindValue(':disc_price', $disc_price);
                $requete->bindValue(':artist_id', $artist_id);
                $requete->bindValue(':disc_genre', $disc_genre);
                $requete->bindValue(':disc_label', $disc_label);
                $requete->bindValue(':disc_year', $disc_year);
                $requete->bindValue(':disc_title', $disc_title);
                $requete->bindValue(':disc_picture', $disc_picture);
                $requete->execute();
                // libère la connection au serveur de BDD
                $requete->closeCursor();
            header("Location: index.php");
            die();
        }
    }
}
?>
<?php
$disc_id=$_GET['disc_id'];

$requete = "SELECT * FROM disc join artist on disc.artist_id=artist.artist_id where disc_id=$disc_id";
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
        $disc_id=$_GET['disc_id'];
        $disc_title = $_POST["disc_title"];
        $artist_id=$_POST['artist_id'];
        $disc_year=$_POST['disc_year'];
        $disc_label=$_POST['disc_label'];
        $disc_genre=$_POST['disc_genre'];
        $disc_price=$_POST['disc_price'];
        $disc_picture=$_FILES["disc_picture"]["name"];
        $new_artist_id=$_POST['new_artist_id'];


            $erreur_file=$_FILES["disc_picture"]["error"];
            // ----------------------------------------------------------
            $aMimeTypes = array("image/gif", "image/jpeg", "image/png");
            
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

        $regXpText="#^[a-zA-Z 0-9,/]+#";
        $regXpYear="#^[0-9]{4,4}$#";
        
        if (!$new_artist_id=="" && preg_match($regXpText,$new_artist_id)==0){    
                $errs["disc_title"][] ="Non d'artiste non valide, vérifiez la saisie";
        }

        if (preg_match($regXpText,$disc_title)==0){
            $errs["disc_title"][] ="titre non valide, vérifiez la saisie";
        }

        if (preg_match($regXpText,$disc_genre)==0){
            $errs["disc_genre"][] ="Genre non valide, vérifiez la saisie";
        }

        if (preg_match($regXpText,$disc_label)==0){
            $errs["disc_label"][] ="label non valide, vérifiez la saisie";
        }

        if (preg_match($regXpYear,$disc_year)==0){
            $errs["disc_year"][] ="année non valide, vérifiez la saisie ( ex: 1984)";
        }


        if (!is_numeric($disc_price)){
            $errs["disc_price"][] ="entrez une valeur numérique pour le prix";
        
        }
        if (count($errs) == 0) {

            if ($erreur_file==0){
            // Les donnees du formulaires ont ete validee (pas d'erreur trouvee)
                move_uploaded_file($_FILES["disc_picture"]["tmp_name"], "src/img/".$disc_picture);
                
                $requete = $db->prepare("UPDATE disc SET disc_picture=:disc_picture WHERE disc_id=:disc_id");
                $requete->bindValue(':disc_picture', $disc_picture);
                $requete->bindValue(':disc_id', $disc_id);
                $requete->execute();
                // libère la connection au serveur de BDD
                $requete->closeCursor();        
            }
            if (!$new_artist_id==""){
                $requeteAdd = $db->prepare("INSERT INTO artist (artist_name) 
                VALUES (:artist_name)");
                
                $requeteAdd->bindValue(':artist_name', $new_artist_id);
                $requeteAdd->execute();
                // libère la connection au serveur de BDD
                $requeteAdd->closeCursor();        

                $requeteGetID=$db->prepare("SELECT artist_id from artist where artist_id=LAST_INSERT_ID() ");
                $requeteGetID->execute();
                $rowGetID = $requeteGetID->fetch(PDO::FETCH_OBJ);
                $artist_id=$rowGetID->artist_id;
                var_dump( $artist_id);
                $requeteGetID->closeCursor();   
            }
                $requete = $db->prepare("UPDATE disc SET disc_title=:disc_title,artist_id=:artist_id,
                disc_year=:disc_year, disc_label=:disc_label, disc_genre=:disc_genre,
                disc_price=:disc_price WHERE disc_id=:disc_id");

                $requete->bindValue(':disc_id', $disc_id);
                $requete->bindValue(':disc_price', $disc_price);
                $requete->bindValue(':artist_id', $artist_id);
                $requete->bindValue(':disc_genre', $disc_genre);
                $requete->bindValue(':disc_label', $disc_label);
                $requete->bindValue(':disc_year', $disc_year);
                $requete->bindValue(':disc_title', $disc_title);
                $requete->execute();
                // libère la connection au serveur de BDD
                $requete->closeCursor();
            header("Location: index.php");
            die();
        }
    }
}
?>
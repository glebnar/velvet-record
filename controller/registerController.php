<?php
$errs = array();

if(isset($_POST["submit"])){
    if (strlen($_POST["submit"]) > 0) {

        $identifiant = $_POST["identifiant"];
        $mail=$_POST['mail'];
        $mdp=$_POST['mdp'];
        $confirm_mdp=$_POST['confirm_mdp'];

        $regXpIdentifiant=" #^[a-zA-Z0-9_]{3,16}$# ";
        $regXpMail=" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ";
        $regXpMdp="#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,})$#";
       
        if (preg_match($regXpIdentifiant,$identifiant)==0){
            $errs["Identifiant"][] ="Entrez un identifiant contenant entre 3 et 16 caractères";
        }
        if (preg_match($regXpMail,$mail)==0){
            $errs["mail"][] ="Entrez une adresse e-mail valide";
        }
        if (preg_match($regXpMdp,$mdp)==0){
            $errs["mdp"][] ="Choisissez un mot de passe contenant au moins 8 caractères dont une majuscule, un chiffre et un caractére spécial";
        }
        if (preg_match($regXpIdentifiant,$identifiant)!=0 && preg_match($regXpMail,$mail)!=0){
            $requeteCheck=$db->prepare("SELECT mbr_identifiant,mbr_mail from membres");
            $requeteCheck->execute();
            while ($row = $requeteCheck->fetch(PDO::FETCH_OBJ)){
                if ($row->mbr_identifiant==$identifiant){
                    $errs["mbr_identifiant"][] ="Identifiant déjà utilisé";
                }
                if ($row->mbr_mail==$mail){
                    $errs["mail"][] ="Un compte utilisant cette adresse existe déjà";
                }
            }
        }
        if (preg_match($regXpMdp,$mdp)!=0 && $mdp!=$confirm_mdp){
            $errs["mdp"][] ="le mot de passe entré et sa confirmation ne correspondent pas";
        }

        if (count($errs) == 0) {
            $mdp_encrypt = password_hash($mdp, PASSWORD_DEFAULT);

            $requete=$db->prepare("INSERT into membres (mbr_identifiant,mbr_mdp,mbr_mail)
            VALUES (:mbr_identifiant,:mbr_mdp,:mbr_mail)");
              
                $requete->bindValue(':mbr_identifiant', $identifiant);
                $requete->bindValue(':mbr_mdp', $mdp_encrypt);
                $requete->bindValue(':mbr_mail', $mail);
                $requete->execute();

                $aHeaders = array('MIME-Version' => '1.0',
                    'Content-Type' => 'text/html; charset=utf-8',
                    'From' => 'Velvet Record <no-reply@velvet-record.fr>',
                );
                $message="Votre inscription sur notre site a bien été réalisée.";

                mail($mail,
                    "Bienvenue chez Velvet record",
                    $message,
                    $aHeaders
                );
                // libère la connection au serveur de BDD
                $requete->closeCursor();

            header("Location: index.php");

        }
    }
}

?>
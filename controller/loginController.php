<?php
session_start();
$erreurLogin=array();
if(isset($_POST["login"])){
    if (strlen($_POST["login"]) > 0) {
        $errsLogin["test"]="test";
        $identifiant = $_POST["identifiant"];
        $mdp=$_POST['mdp'];
        $requeteLogin=$db->prepare("SELECT mbr_mdp,mbr_niveau from membres where mbr_identifiant=:identifiant");
       
        $requeteLogin->bindValue(':identifiant', $identifiant);
        $requeteLogin->execute();
        $nbr=$requeteLogin->rowCount();

        $row = $requeteLogin->fetch(PDO::FETCH_OBJ);
        if($nbr==0){
            $erreurLogin["login"][]="identifiant inconnu";

        }
        else{
            if(isset($row->mbr_mdp) ){
                if(password_verify($mdp,$row->mbr_mdp)){
                    $_SESSION["login"]=$identifiant;
                    $_SESSION["niveau"]=$row->mbr_niveau;
                    unset($_POST["login"]);
                }
                else{
                    $erreurLogin["mdp"][]="mot de passe incorrect";
                }
            }
        }



    }
}
if(isset($_POST["logout"])){
    if (strlen($_POST["logout"]) > 0) {
        unset($_SESSION["login"]);
        unset($_SESSION["niveau"]);
        if (ini_get("session.use_cookies")) 
        {
            setcookie(session_name(), '', time()-42000);
        }
    
        session_destroy();
    }
}
?>
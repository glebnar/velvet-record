<?php
if ($_SERVER["SERVER_NAME"] == "dev.amorce.org")
{
    // Paramètres de connexion serveur distant
    $host = "localhost";
    $login= "kpicard";     // Votre loggin d'accès au serveur de BDD 
    $password="kp20104";    // Le Password pour vous identifier auprès du serveur
    $base = "kpicard";    // La BDD avec laquelle vous voulez travailler 
}

// ici un 'OU' car il se peut que le 'localhost' ne soit pas reconnu !
// if ($_SERVER["SERVER_NAME"] == "localhost"||$_SERVER["SERVER_NAME"] == "127.0.0.1")

// également pour éviter la condition ci-dessus, ne mettre qu'un 'ELSE'

else
{
    // Paramètres de connexion serveur local
    $host = "localhost";
    $login= "root";     // Votre loggin d'accès au serveur de BDD 
    $password="";    // Le Password pour vous identifier auprès du serveur
    $base = "record";    // La bdd avec laquelle vous voulez travailler 
}
    try{        
        //$db = new PDO('mysql:host=localhost;charset=utf8;dbname=hotel', 'root', '');
        $db = new PDO('mysql:host='.$host.';charset=utf8;dbname='.$base.'', $login, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }

   catch (Exception $e) {
        echo "La connection à la base e données a échoué ! <br>";
        echo "Merci de bien vérifier vos paramètres de connection ...<br>";
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode(). "<br>";
        die("Fin du script");
   } 

?>
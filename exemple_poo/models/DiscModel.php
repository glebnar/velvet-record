<?php
include '../entities/Disc.php';

/**
 * Class discModel
 * la classe DiscModel hérite des propriétés de la classe Disc
 * Les propriétés de la classe Disc sont donc accessible dans la classe DiscModel
 */
class DiscModel extends Disc
{

    /**
     * discModel constructor.
     */
    public function __construct()
    {
        $database = connexion::getInstance();
        $this->pdo = $database->pdo;
    }

    /**
     * @return array
     * Méthode permettant la recherche de tous les entrées de la table disc
     */
    public function getAllDisc()
    {
        $query = 'SELECT * FROM `disc`';
        $disc = $this->pdo->prepare($query);
        $disc->execute();
        // si le retour de l'exécution est un objet
        if(is_object($disc)) {
            // on va chercher tous les résultats de la requête
            $result = $disc->fetchAll(PDO::FETCH_OBJ);
        }
        // retour du résultat de la requête vers le contrôleur
        return $result;
    }

    public function addDisc($disc)
    {
        $query = 'INSERT INTO `disc` (`disc_title`, `disc_year`, `disc_label`, `disc_genre`, `disc_price`, `artist_id`) VALUES (:disc_title, :disc_year, :disc_label, :disc_genre, :disc_price, :artist_id)';
        // préparationd de la requête
        $addDisc = $this->pdo->prepare($query);
        // liaison des marqueurs nominatifs avec les objets récupérés dans le contrôleur
        $addDisc->bindValue(':disc_title', $disc->disc_title, PDO::PARAM_STR);
        $addDisc->bindValue(':disc_year', $disc->disc_year, PDO::PARAM_STR);
        $addDisc->bindValue(':disc_label', $disc->disc_label, PDO::PARAM_STR);
        $addDisc->bindValue(':disc_genre', $disc->disc_genre, PDO::PARAM_STR);
        $addDisc->bindValue(':disc_price', $disc->disc_price, PDO::PARAM_STR);
        $addDisc->bindValue(':artist_id', $disc->artist_id, PDO::PARAM_STR);
        // exécution de la requête
        return $addDisc->execute();
    }

    public function deleteDisc($disc_id)
    {
        $query="DELETE from disc WHERE disc_id=:disc_id";
        $deleteDisc = $this->pdo->prepare($query);
        $deleteDisc->bindValue(':disc_id', $disc_id, PDO::PARAM_STR);
        return $deleteDisc->execute();

    }
}
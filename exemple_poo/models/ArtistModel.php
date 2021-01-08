<?php
include '../entities/Artist.php';

class ArtistModel extends Artist
{
    public function __construct()
    {
        $database = Connexion::getInstance();
        $this->pdo = $database->pdo;
    }

    /**
     * @return array
     */
    public function getArtist()
    {
        $query = 'SELECT * FROM `artist`';
        $list = $this->pdo->query($query);
        return $list->fetchAll(PDO::FETCH_OBJ);
    }

    public function addArtist($artist){
        $query = "INSERT INTO artist (artist_name) 
        VALUES (:artist_name)";
        $addArtist = $this->pdo->prepare($query);

        $addArtist->bindValue(':artist_name', $artist->artist_name, PDO::PARAM_STR);
        return $addArtist->execute();

    }
}
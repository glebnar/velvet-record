<?php


class Artist
{
    // déclaration des propriétés de la classe artist, correspondant au champs de la table artist
    /**
     * @var int
     */
    public $artist_id;

    /**
     * @var string
     */
    public $artist_name;

    /**
     * @var string
     */
    public $artist_url;

    // déclaration des getters
    /**
     * @return int
     */
    public function getArtistId()
    {
        return $this->artist_id;
    }

    /**
     * @return string
     */
    public function getArtistName()
    {
        return $this->artist_name;
    }

    // déclaration des setters
    /**
     * @return string
     */
    public function getArtistUrl()
    {
        return $this->artist_url;
    }

    /**
     * @param $artist_id
     * @return mixed
     */
    public function setArtistId($artist_id)
    {
        return $this->artist_id = $artist_id;
    }

    /**
     * @param $artist_name
     * @return mixed
     */
    public function setArtistName($artist_name)
    {
        return $this->artist_name = $artist_name;
    }

    /**
     * @param $artist_url
     * @return mixed
     */
    public function setArtistUrl($artist_url)
    {
        return $this->artist_url = $artist_url;
    }
}
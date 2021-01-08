<?php

/**
 * Class Disc
 * classe contenant les propriétés, getters et setters de la table disc
 */
class Disc
{
    // déclaration des propriétés
    public $disc_id;
    public $disc_title;
    public $disc_year;
    public $disc_picture;
    public $disc_label;
    public $disc_genre;
    public $disc_price;
    public $artist_id;

    // déclaration des getters
    public function getDiscId()
    {
        return $this->disc_id;
    }

    public function getDisctitle()
    {
        return $this->disc_title;
    }

    public function getDiscYear()
    {
        return $this->disc_year;
    }

    public function getDiscPicture()
    {
        return $this->disc_picture;
    }

    public function getDiscLabel()
    {
        return $this->disc_label;
    }

    public function getDiscGenre()
    {
        return $this->disc_genre;
    }

    public function getDiscPrice()
    {
        return $this->disc_price;
    }

    public function getArtistId()
    {
        return $this->artist_id;
    }

    // déclaration des setters
    public function setDiscId($disc_id)
    {
        return $this->disc_id = $disc_id;
    }

    public function setDiscTitle($disc_title)
    {
        return $this->disc_title = $disc_title;
    }

    public function setDiscYear($disc_year)
    {
        return $this->disc_year = $disc_year;
    }

    public function setDiscPicture($disc_picture)
    {
        return $this->disc_picture = $disc_picture;
    }

    public function setDiscLabel($disc_label)
    {
        return $this->disc_label = $disc_label;
    }

    public function setDiscGenre($disc_genre)
    {
        return $this->disc_genre = $disc_genre;
    }

    public function setDiscPrice($disc_price)
    {
        return $this->disc_price = $disc_price;
    }

    public function setArtistId($artist_id)
    {
        return $this->artist_id = $artist_id;
    }
}
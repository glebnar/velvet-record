<?php

/**
 * classe permettant la connexion à la base de données
 *
 * @author cedric
 */
class Connexion {

    public $pdo;
    private $host = '';
    private $login = '';
    private $password = '';
    private $dbName = '';
    private static $_instance;

    private function __construct()
    {
        $this->host = 'localhost';
        $this->login = 'root';
        $this->password = '';
        $this->dbName = 'record';


        /**
         * Méthode permettant de créer l'instance PDO
         */
        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName . ';charset=UTF8;', $this->login, $this->password);
        } catch (Exception $ex) {
            $message = 'Erreur P.D.O dans ' . $ex->getFile() . ' ligne ' . $ex->getLine() . ' : ' . $ex->getMessage();
            die($message);
        }
    }

    /**
     * récupère l'instance de la classe
     * @return connexion
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * fermeture de la connexion à la base de données
     */
    public function __destruct()
    {
        $this->pdo = NULL;
    }

}

<?php

/**
 * Glavni controller
 */
class Controller
{
    public $db = null;

    /**
     * Kada je napravljen controller stvara se konekcija sa bazom
     */
    function __construct()
    {
        $this->openDatabaseConnection();
        session_start();
    }

    /**
     * Spajanje na bazu sa podacima iz konfiguracijske datoteke config.php
     */
    private function openDatabaseConnection()
    {
        //Koristenje PDO i pripadnih opcija zbog lakse manipulacije
        //vraca objekte
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
    }

    /**
     * Ucitavanje pripadajuceg modela
     */
    public function loadModel($model_name)
    {
        require 'application/models/' . strtolower($model_name) . '.php';
        //vracanje novog modela i slanje BP konekcije modelu
        return new $model_name($this->db);
    }
}

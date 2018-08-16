<?php

//namespace BlogFram;
//require_once 'vendor/autoload.php';
require_once 'Configuration.php';

abstract class DBFactory
{
    private static $db;

    protected static function getDb()
    {
        if (self::$db === null) {
            // Récupération des paramètres de configuration BD
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $password = Configuration::get("password");
            // Création de la connexion
            self::$db = new PDO($dsn, $login, $password,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$db;
    }

}

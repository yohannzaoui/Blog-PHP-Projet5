<?php

/**
 * Classe abstraite Manager.
 * Centralise les services d'accès à une base de données.
 * Utilise l'API PDO
 *
 * 
 */
abstract class Manager {

    /** Objet PDO d'accès à la BD */
    private $_db;

    /**
     * Exécute une requête SQL éventuellement paramétrée
     * 
     * @param string $sql La requête SQL
     * @param array $valeurs Les valeurs associées à la requête
     * @return PDOStatement Le résultat renvoyé par la requête
     */
    protected function executeReq($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getDb()->query($sql); // exécution directe
        }
        else {
            $resultat = $this->getDb()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
     * 
     * @return PDO L'objet PDO de connexion à la BDD
     */
    protected function getDb() {
        if ($this->_db == null) {
            // Création de la connexion
            $this->_db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8',
                    'root', '',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->_db;
    }

}
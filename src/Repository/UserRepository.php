<?php

//namespace BlogControllers;

//require_once 'vendor/autoload.php';

require_once 'etc/DBFactory.php';
require_once 'src/Entity/User.php';


class UserRepository extends DBFactory {

    /**
     * Vérifie qu'un utilisateur existe dans la BD
     *
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($pseudo, $pass)
    {
        $req = $this->getDb()->prepare('SELECT id FROM admins WHERE pseudo=? AND pass=?');
        $utilisateur = $req->execute(array($pseudo, $pass));
        return ($utilisateur->rowCount() == 1);
    }

    /**
     * Renvoie un utilisateur existant dans la BD
     *
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return mixed L'utilisateur
     * @throws Exception Si aucun utilisateur ne correspond aux paramètres
     */
    public function getUtilisateur($pseudo, $pass)
    {
        $req = $this->getDb()->prepare('SELECT id FROM admins WHERE pseudo=? AND pass=?');
        $utilisateur = $req->execute(array($pseudo, $pass));
        if ($utilisateur->rowCount() == 1)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }

}

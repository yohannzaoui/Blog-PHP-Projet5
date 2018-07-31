<?php

require_once 'Models/PostManager.php';
require_once 'Views/View.php';

class ControllerHome {

    private $billet;

    public function __construct() {
        $this->billet = new PostManager();
    }

// Affiche la liste de tous les billets du blog
    public function accueil() {
        $billets = $this->billet->getRecentPosts();
        $vue = new View("Home");
        $vue->generer(array('billets' => $billets));
    }

}


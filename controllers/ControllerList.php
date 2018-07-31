<?php

require_once 'Models/PostManager.php';
require_once 'Views/View.php';

class ControllerList {

    private $billet;

    public function __construct() {
        $this->billet = new PostManager();
    }

// Affiche la liste de tous les billets du blog
    public function list() {
        $billets = $this->billet->getAll();
        $vue = new View("List");
        $vue->generer(array('billets' => $billets));
    }

}
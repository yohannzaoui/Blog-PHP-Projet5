<?php

require_once 'Models/PostManager.php';
require_once 'system/View.php';

class ControllerHome {

    private $_postManager;

    public function __construct() {
        $this->_postManager = new PostManager();
    }

// Affiche la liste de tous les billets du blog
    public function home() {
        $posts = $this->_postManager->getRecentPosts();
        $view = new View("Home");
        $view->generer(array('posts' => $posts));
    }

}


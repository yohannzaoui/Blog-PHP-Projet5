<?php

require_once 'Models/PostManager.php';
require_once 'system/View.php';

class ControllerPost {

    private $_posts;

    public function __construct() {
        $this->_posts = new PostManager();
    }

    // Affiche les détails sur un billet
    public function billet() {
        $posts = $this->_posts->getListPosts();
        $view = new View("ListPosts");
        $view->generer(array('posts' => $posts));
    }
}


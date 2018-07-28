<?php

require_once 'Models/PostManager.php';
require_once 'Models/CommentManager.php';
require_once 'system/View.php';

class ControllerListPosts {

    private $_postManager;

    public function __construct() {
        $this->_postManager = new PostManager();
    }

    // Affiche les détails sur un billet
    public function listPost() {
        $posts = $this->_postManager->getListPosts();
        $view = new View("ListPosts");
        $view->createView(array('posts' => $posts));
    }
}


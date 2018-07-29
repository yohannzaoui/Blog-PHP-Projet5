<?php

require_once 'Models/PostManager.php';
require_once 'Models/CommentManager.php';
require_once 'system/ViewFrontend.php';

class ControllerListPosts {

    private $_postManager;

    public function __construct() {
        $this->_postManager = new PostManager();
    }

    // Affiche les détails sur un billet
    public function listPost() {
        $posts = $this->_postManager->getListPosts();
        $view = new ViewFrontend("ListPosts");
        $view->createView(array('posts' => $posts));
    }
}


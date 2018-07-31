<?php

require_once 'Models/PostManager.php';
require_once 'Views/View.php';

class ControllerList {

    private $post;

    public function __construct() {
        $this->post = new PostManager();
    }

// Affiche la liste de tous les billets du blog
    public function list() {
        $posts = $this->post->getListPosts();
        $view = new View("List");
        $view->generer(array('posts' => $posts));
    }

}
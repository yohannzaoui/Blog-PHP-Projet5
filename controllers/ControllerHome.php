<?php

require_once 'Models/PostManager.php';
require_once 'Views/View.php';

class ControllerHome {

    private $post;

    public function __construct() {
        $this->post = new PostManager();
    }

    public function home() {
        $posts = $this->post->getRecentPosts();
        $view = new View("Home");
        $view->generer(array('posts' => $posts));
    }

}


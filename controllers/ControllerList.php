<?php

require_once 'Models/PostManager.php';
require_once 'System/View.php';

class ControllerList {

    private $post;

    public function __construct() {
        $this->post = new PostManager();
    }

    public function list() {
        $posts = $this->post->getListPosts();
        $view = new View("List");
        $view->generer(array('posts' => $posts));
    }

}
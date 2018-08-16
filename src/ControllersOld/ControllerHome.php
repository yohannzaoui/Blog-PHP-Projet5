<?php

//namespace BlogControllers;
//require_once 'vendor/autoload.php';
//use BlogFram\Controller;
require_once 'etc/Controller.php';
require_once 'src/Repository/PostRepository.php';

class ControllerHome extends Controller {

    private $post;

    public function __construct() {
        $this->post = new PostRepository();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $posts = $this->post->getRecentPosts();
        $this->genererVue(array('posts' => $posts));
    }

}

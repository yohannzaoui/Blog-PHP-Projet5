<?php

//namespace BlogFram;
//require_once 'vendor/autoload.php';

require_once 'etc/Controller.php';
require_once 'src/Repository/PostRepository.php';

class ControllerAll extends Controller {

    private $post;

    public function __construct() {
        $this->post = new PostRepository();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $posts = $this->post->getAll();
        $this->genererVue(array('posts' => $posts));
    }

}

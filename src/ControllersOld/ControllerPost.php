<?php

//namespace BlogControllers;
//require_once 'vendor/autoload.php';

//use BlogFram\Controller;

require_once 'etc/Controller.php';
require_once 'src/Repository/PostRepository.php';
require_once 'src/Repository/CommentRepository.php';

class ControllerPost extends Controller {

    private $post;
    private $comment;

    public function __construct() {
        $this->post = new PostRepository();
        $this->comment = new CommentRepository();
    }

    // Affiche les détails sur un billet
    public function index() {
        $idPost = $this->request->getParams("id");
        $post = $this->post->post($idPost);
        $comments = $this->comment->getComments($idPost);
        $this->genererVue(array('post' => $post, 'comments' => $comments));
    }

    // Ajoute un commentaire sur un billet
    public function commenter() {
        $idPost = $this->request->getParams("id");
        $pseudo = $this->request->getParams("pseudo");
        $content = $this->request->getParams("content");

        $this->comment->addComment($pseudo, $content, $idPost);

        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }
}

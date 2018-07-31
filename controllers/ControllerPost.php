<?php

require_once 'Models/PostManager.php';
require_once 'Models/CommentManager.php';
require_once 'Views/View.php';

class ControllerPost {

    private $post;
    private $comment;

    public function __construct() {
        $this->post = new PostManager();
        $this->comment = new CommentManager();
    }

    // Affiche les détails sur un billet
    public function post($id) {
        $post = $this->post->getPost($id);
        $comments = $this->comment->valideComment($id);
        $view = new View("Post");
        $view->generer(array('post' => $post, 'commentaires' => $comments));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idPost) {
        // Sauvegarde du commentaire
        $this->commente->addComment($auteur, $contenu, $idPost);
        // Actualisation de l'affichage du billet
        $this->post($idPost);
    }

}


<?php

require_once 'Models/PostManager.php';
require_once 'Models/CommentManager.php';
require_once 'system/ViewFrontend.php';

class ControllerPost {

    private $_postManager;
    private $_commentManager;

    public function __construct() {
        $this->_postManager = new PostManager();
        $this->_commentManager = new CommentManager();
    }

    // Affiche les détails sur un billet
    public function post($idPost) {
        $post = $this->_postManager->getPost($idPost);
        $comments = $this->_commentManager->getComments($idPost);
        $view = new ViewFrontend("Post");
        $view->createView(array('post'=> $post, 'comments' => $comments));
    }

    // Ajoute un commentaire à un billet
    public function comment($pseudo, $content, $idPost) {
        // Sauvegarde du commentaire
        $this->_commentManager->addComment($pseudo, $content, $idPost);
        // Actualisation de l'affichage du billet
        $this->post($idPost);
    }

}


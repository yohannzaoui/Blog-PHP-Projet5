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
    public function post($idBillet) {
        $post = $this->_postManager->getPost($idBillet);
        $comments = $this->_commentManager->getComments($idBillet);
        $view = new ViewFrontend("Post");
        $view->createView(array('post'=> $post, 'comments' => $comments));
    }

    // Ajoute un commentaire à un billet
    public function comment($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->_commentManager->addComment($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        $this->post($idBillet);
    }

}


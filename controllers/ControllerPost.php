<?php

require_once 'Models/PostManager.php';
require_once 'Models/CommentManager.php';
require_once 'system/View.php';

class ControllerPost {

    private $_postManager;
    private $_commentManager;

    public function __construct() {
        $this->_postManager = new PostManager();
        $this->_commentManager = new CommentManager();
    }

    // Affiche les détails sur un billet
    public function post($idBillet) {
        $post = $this->_postManager->getBillet($idBillet);
        $comments = $this->_commentManager->getComments($idBillet);
        $view = new View("Post");
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


<?php

require_once 'Models/PostManager.php';
require_once 'Models/CommentManager.php';
require_once 'system/View.php';

class ControllerPost {

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new PostManager();
        $this->commentaire = new CommentManager();
    }

    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $vue = new View("Post");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }

}


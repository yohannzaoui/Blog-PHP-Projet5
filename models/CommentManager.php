<?php

require_once 'Models/Manager.php';
require_once 'Models/Comment.php';
/**
 * 
 * 
 * 
 */
class CommentManager extends Manager {

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
        $sql = 'select id, creation_date,pseudo,content from comments where id_post=? ORDER BY creation_date DESC';
        $commentaires = $this->executeReq($sql, array($idBillet));
        return $commentaires;
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'insert into comments (creation_date, pseudo, content,id_post,publication) values(NOW(), ?, ?, ?,0)';
        //$date = date(DATE_W3C);  // Récupère la date courante
        $this->executeReq($sql, array($auteur, $contenu, $idBillet));
    }

}
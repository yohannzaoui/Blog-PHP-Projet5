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
    public function getComments($id) {
        $sql = ('SELECT id, creation_date,pseudo,content FROM comments WHERE id_post=? ORDER BY creation_date DESC LIMIT 10');
        $comments = $this->executeReq($sql, array($id));
        return $comments;
    }

    // Ajoute un commentaire dans la base
    public function addComment($pseudo, $content, $idPost) {
        $sql = ('INSERT INTO comments (creation_date, pseudo, content,id_post,publication) VALUES (NOW(), ?, ?, ?,0)');
        $this->executeReq($sql, array($pseudo, $content, $idPost));
    }

}
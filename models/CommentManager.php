<?php

require_once 'Models/Manager.php';
/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class CommentManager extends Manager {

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
        $sql = 'select * from comments'
                . ' where id_post=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'insert into comments(creation_date, pseudo, content, id_post)'
            . ' values(now(), ?, ?, ?)';
        //$date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($auteur, $contenu, $idBillet));
    }
}
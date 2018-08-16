<?php

//namespace BlogControllers;
//require_once 'vendor/autoload.php';
//use BlogFramework;

require_once 'etc/DBFactory.php';
require_once 'src/Entity/Comment.php';


class CommentRepository extends DBFactory {


    public function getComments(int $idPost) {
        $comments = [];
        $req = $this->getDb()->prepare('SELECT id,id_post,pseudo,content,creation_date,publication FROM comments WHERE publication=0 AND id_post='.$idPost);
        $req->execute(array($idPost));
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $comments [] = new Comment($data);
        }
        return $comments;
 }

 /*public function getComments(int $idPost) {

     $req = $this->getDb()->prepare('SELECT id,id_post,pseudo,content,creation_date,publication FROM comments WHERE publication=0 AND id_post='.$idPost);
     $req->execute(array($idPost));
     $comments = $req->setFetchMode(PDO::FETCH_OBJECT);
     return $comments;
}*/


    public function addComment($pseudo, $content, $idPost) {
        $req = $this->getDb()->prepare('INSERT INTO comments (pseudo, content, id_post, publication) values(?, ?, ?,0)');
        $req->execute(array($pseudo, $content, $idPost));
    }

    /**
     * Renvoie le nombre total de commentaires
     *
     * @return int Le nombre de commentaires
     */
    public function getNombreCommentaires()
    {
        $sql = 'select count(*) as nbCommentaires from comments';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbCommentaires'];
    }
}

<?php

require_once 'Models/Manager.php';
require_once 'Models/Comment.php';


class CommentManager extends Manager {

    public function valideComment($id) {
        $comments = [];
        $req = $this->getDb()->prepare('SELECT id,id_post,pseudo,content,creation_date,publication FROM comments WHERE publication=0 AND id_post='.$id);
        $req->execute(array($id));
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }
        return $comments;
 }

    public function addComment($author, $content, $idPost) {
        $req = $this->getDb()->prepare('INSERT INTO comments(creation_date, pseudo, content, id_post) VALUES (NOW(), ?, ?, ?)');
        $req->execute(array($author, $content, $idPost));
    }
}
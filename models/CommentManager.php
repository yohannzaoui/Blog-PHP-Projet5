<?php

namespace BlogModels;

require 'vendor/autoload.php';

class CommentManager extends Manager {

    public function valideComment(int $id) {
        $comments = [];
        $req = $this->getDb()->prepare('SELECT id,id_post,pseudo,content,creation_date,publication FROM comments WHERE publication=0 AND id_post='.$id);
        $req->execute(array($id));
        while ($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }
        return $comments;
 }

    public function addComment()
    {
        $req = $this->getDb()->prepare('INSERT INTO comments(creation_date, pseudo, content, id_post,publication) VALUES (NOW(), :pseudo, :content, :id_post, 1)');
        $req->bindValue(':id_post',htmlspecialchars($_GET['id']),\PDO::PARAM_INT);
        $req->bindValue(':pseudo',htmlspecialchars($_POST['pseudo']),\PDO::PARAM_STR);
        $req->bindValue(':content',htmlspecialchars($_POST['content']),\PDO::PARAM_STR);
        $req->execute();
    }
}

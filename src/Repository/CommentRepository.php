<?php

namespace App\repository;

use Core\DBFactory;
use App\entity\Comment;
use PDO;

class CommentRepository extends DBFactory
{
    public function getCommentsFromPost($idPost)
    {
        $sql = 'SELECT id,id_post,pseudo,content,publication,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr FROM comments WHERE publication = 1 AND id_post ='.$idPost.' ORDER BY creation_date DESC';
        //$req->bindvalue(':idpost',(int)$idPost, PDO::PARAM_INT);
        $req = $this->sql($sql, [$idPost]);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Comment::CLASS);
        $comments = $req->fetchAll();
        return $comments;
    }

    public function addComment($comment)
    {
        extract($comment);
        $sql = 'INSERT INTO comments (id_post, pseudo, content, publication, creation_date) VALUES (?,?,?,0,NOW())';
        $req = $this->sql($sql, [$idPost,$pseudo, $content]);
    }

    public function getCommentsNoValide()
    {
        $sql = 'SELECT id,id_post,pseudo,content,publication,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr FROM comments WHERE publication = 0 ORDER BY creation_date DESC';
        $req = $this->sql($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Comment::CLASS);
        $comments = $req->fetchAll();
        return $comments;
    }

    public function validateComment($id)
    {
        $sql = 'UPDATE comments SET publication=1 WHERE id='.$id;
        $req = $this->sql($sql, [$id]);
    }

    public function deleteComment($id)
    {
        $req = $this->getDb()->prepare('DELETE FROM comments WHERE id='.$id);
        $req->execute([$id]);
    }

    public function countComments()
    {
        $sql = 'SELECT COUNT(*) as nb FROM comments WHERE publication = 0';
        $line = $this->sql($sql)->fetch();
        return $line['nb'];
    }

    private function buildObject($row)
    {
        $comment = new Comment;
        $comment->setId($row['id']);
        $comment->setPostId($row['id_post']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreation_date($row['creation_date_fr']);
        $comment->setPublication($row['publication']);
        return $comment;
    }
}
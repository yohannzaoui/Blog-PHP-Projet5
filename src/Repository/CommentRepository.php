<?php

namespace App\repository;

use Core\DBFactory;
use App\entity\Comment;

class CommentRepository extends DBFactory
{
    public function getCommentsFromPost($idPost)
    {
        $sql = 'SELECT id,id_post,pseudo,content,publication,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr FROM comments WHERE publication = 1 AND id_post = ? ORDER BY creation_date DESC';
        $result = $this->sql($sql, [$idPost]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function addComment($comment)
    {
        extract($comment);
        $sql = 'INSERT INTO comments (id_post, pseudo, content, publication, creation_date) VALUES (?,?,?,0,NOW())';
        $this->sql($sql, [$idPost,$pseudo, $content]);
    }

    public function getCommentsNoValide()
    {
        $sql = 'SELECT id,id_post,pseudo,content,publication,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr FROM comments WHERE publication = 0 ORDER BY creation_date DESC';
        $result = $this->sql($sql);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function validateComment($id)
    {
        $sql = 'UPDATE comments SET publication=1 WHERE id='.$id;
        $this->sql($sql, [$id]);
    }

    public function deleteComment($id)
    {
        $sql = 'DELETE FROM comments WHERE id='.$id;
        $this->sql($sql, [$id]);
    }

    private function buildObject(array $row)
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

<?php

namespace App\Repository;

use App\Repository\Interfaces\CommentRepositoryInterface;
use Core\DBFactory;
use App\Entity\Comment;


/**
 * Class CommentRepository
 * @package App\Repository
 */
class CommentRepository extends DBFactory implements CommentRepositoryInterface
{


    /**
     * @param $idPost
     * @return array
     */
    public function getCommentsFromPost($idPost)
    {
        $sql = 'SELECT id, id_post, pseudo, content, publication, DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creationDateFr FROM comments WHERE publication = 1 AND id_post = ? ORDER BY creation_date DESC';
        $req = $this->sql($sql, [$idPost]);
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Comment::CLASS);
        $comments = $req->fetchAll();
        return $comments;
    }


    /**
     * @param $idPost
     * @param $pseudo
     * @param $content
     */
    public function addComment($idPost, $pseudo, $content)
    {
        $sql = 'INSERT INTO comments (id_post, pseudo, content, publication, creation_date) VALUES (?,?,?,0,NOW())';
        $this->sql($sql, [$idPost, $pseudo, $content]);
    }


    /**
     * @return array
     */
    public function getCommentsNoValide()
    {
        $sql = 'SELECT id, id_post, pseudo, content, publication, DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creationDateFr FROM comments WHERE publication = 0 ORDER BY creation_date DESC';
        $req = $this->sql($sql);
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Comment::CLASS);
        $comments = $req->fetchAll();
        return $comments;
    }


    /**
     * @param $id
     * @throws \Exception
     */
    public function validateComment($id)
    {
        $sql = 'SELECT id FROM comments WHERE publication = 0 AND id = ?';
        $req = $this->sql($sql, [$id]);
        $count = $req->rowCount();
        if ($count > 0) {
            $sql = 'UPDATE comments SET publication = 1 WHERE id = ?';
            $this->sql($sql, [$id]);
        } else {
            throw new \Exception('L\'ID n\'éxiste pas ');
        }
        
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function deleteComment($id)
    {
        $sql = 'SELECT id FROM comments WHERE id = ?';
        $req = $this->sql($sql, [$id]);
        $count = $req->rowCount();
        if ($count > 0) {
            $sql = 'DELETE FROM comments WHERE id = ?';
            $this->sql($sql, [$id]);
        } else {
            throw new \Exception('L\'ID n\'éxiste pas ');
        }
    }


    /**
     * @param $idPost
     * @throws \Exception
     */
    public function deleteComments($idPost)
    {
        $sql = 'SELECT id_post FROM comments WHERE id_post = ?';
        $req = $this->sql($sql, [$idPost]);
        $count = $req->rowCount();
        if ($count > 0) {
            $sql = 'DELETE FROM comments WHERE id_post = ?';
            $this->sql($sql, [$idPost]);
        } else {
            throw new \Exception("Il n'y a pas de commentaire sur cet article");
        }
        
    }


    /**
     * @return mixed
     */
    public function countComments()
    {
        $sql = 'SELECT COUNT(*) as nb FROM comments WHERE publication = 0';
        $line = $this->sql($sql)->fetch();
        return $line['nb'];
    }
}

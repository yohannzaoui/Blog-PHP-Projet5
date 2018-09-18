<?php
namespace App\Repository;

use App\Repository\Interfaces\CommentRepositoryInterface;
use Core\DBFactory;
use App\Entity\Comment;
use PDO;

/**
 *
 */
class CommentRepository extends DBFactory implements CommentRepositoryInterface
{

    /**
     * 
     */
    public function getCommentsFromPost($idPost)
    {
        $sql = 'SELECT id, id_post, pseudo, content, publication, DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creationDateFr FROM comments WHERE publication = 1 AND id_post = ? ORDER BY creation_date DESC';
        $req = $this->sql($sql, [$idPost]);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Comment::CLASS);
        $comments = $req->fetchAll();
        return $comments;
    }

    /**
     * 
     */
    public function addComment($idPost, $pseudo, $content)
    {
        $sql = 'INSERT INTO comments (id_post, pseudo, content, publication, creation_date) VALUES (?,?,?,0,NOW())';
        $this->sql($sql, [$idPost, $pseudo, $content]);
    }

    /**
     * 
     */
    public function getCommentsNoValide()
    {
        $sql = 'SELECT id, id_post, pseudo, content, publication, DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creationDateFr FROM comments WHERE publication = 0 ORDER BY creation_date DESC';
        $req = $this->sql($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Comment::CLASS);
        $comments = $req->fetchAll();
        return $comments;
    }

    /**
     * 
     */
    public function validateComment($id)
    {
        $sql = 'UPDATE comments SET publication = 1 WHERE id = ?';
        $this->sql($sql, [$id]);
    }

    /**
     * 
     */
    public function deleteComment($id)
    {
        $sql = 'DELETE FROM comments WHERE id = ?';
        $this->sql($sql, [$id]);
    }

    /**
     * 
     */
    public function deleteComments($idPost)
    {
        $sql = 'DELETE FROM comments WHERE id_post = ?';
        $this->sql($sql, [$idPost]);
    }

    /**
     * 
     */
    public function countComments()
    {
        $sql = 'SELECT COUNT(*) as nb FROM comments WHERE publication = 0';
        $line = $this->sql($sql)->fetch();
        return $line['nb'];
    }
}

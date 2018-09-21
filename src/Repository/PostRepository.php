<?php
namespace App\Repository;

use App\Repository\Interfaces\PostRepositoryInterface;
use Core\DBFactory;
use App\Entity\Post;
use PDO;

/**
 *
 */
class PostRepository extends DBFactory implements PostRepositoryInterface
{

    /**
     * 
     */
    public function getRecentPosts()
    {
        $sql = 'SELECT id, author, title, subtitle, content, DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creationDateFr, DATE_FORMAT(update_date,"%d/%m/%Y à %Hh%imin") AS updateDateFr FROM posts ORDER BY creation_date DESC LIMIT 0,3';
        $req=$this->sql($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Post::class);
        $posts = $req->fetchAll();
        return $posts;
    }

    /**
     * 
     */
    public function getAll()
    {
        $sql = 'SELECT id, author, title, subtitle, content, DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creationDateFr, DATE_FORMAT(update_date,"%d/%m/%Y à %Hh%imin") AS updateDateFr FROM posts ORDER BY creation_date DESC';
        $req=$this->sql($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Post::CLASS);
        $posts = $req->fetchAll();
        return $posts;
    }

    /**
     * 
     */
    public function getPost($id)
    {
        $sql = 'SELECT id, author, title, subtitle, content, DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creationDateFr, DATE_FORMAT(update_date,"%d/%m/%Y à %Hh%imin") AS updateDateFr FROM posts WHERE id = ?';
        $req = $this->sql($sql, [$id]);
        $count = $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Post::CLASS);
        if ($count > 0) {
            $post = $req->fetch();
            return $post;
        } else {
            throw new \Exception('Article inconnu ');
        }
        
    }

    /**
     * 
     */
    public function addPost($author, $title, $subtitle, $content)
    {
        $sql= 'INSERT INTO posts (title, subtitle, author, content, creation_date) VALUES (?,?,?,?,NOW())';
        $this->sql($sql, [$title, $subtitle, $author, $content]);
        $id = $this->db->lastInsertId();
        return $id;
    }

    /**
     * 
     */
    public function updatePost($id, $author, $title, $subtitle, $content)
    {
        $sql = 'UPDATE posts SET author=?, title=?, subtitle=?, content=?, update_date=NOW() WHERE id = ?';
        $this->sql($sql, [$author, $title, $subtitle, $content, $id]);
    }

    /**
     * 
     */
    public function deletePost($id)
    {
        $sql = 'SELECT id FROM posts WHERE id = ?';
        $req = $this->sql($sql, [$id]);
        $count = $req->rowCount();
        if ($count > 0) {
            $sql = 'DELETE FROM posts WHERE id = ?';
            $this->sql($sql, [$id]);
        } else {
            throw new \Exception('L\'ID n\'éxiste pas ');
        }
        
    }

    /**
     * 
     */
    public function countPosts()
    {
        $sql = 'SELECT COUNT(*) as nb FROM posts';
        $line = $this->sql($sql)->fetch();
        return $line['nb'];
    }
}

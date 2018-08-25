<?php

namespace App\repository;

use Core\DBFactory;
use App\Entity\Post;
use PDO;

class PostRepository extends DBFactory
{
    /*public function getRecentPosts()
    {
        $req = $this->getDb()->query('SELECT id,author,title,subtitle,content,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr, DATE_FORMAT(update_date,"%d/%m/%Y à %Hh%imin") AS update_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0,3');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Post::CLASS);
        $posts = $req->fetchAll();
        return $posts;
    }*/

    public function getRecentPosts()
    {
        $sql = 'SELECT id,author,title,subtitle,content,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr, DATE_FORMAT(update_date,"%d/%m/%Y à %Hh%imin") AS update_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0,3';
        $req=$this->sql($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Post::class);
        $posts = $req->fetchAll();
        return $posts;
    }

    public function getAll()
    {
        $sql = 'SELECT id,author,title,subtitle,content,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr, DATE_FORMAT(update_date,"%d/%m/%Y à %Hh%imin") AS update_date_fr FROM posts ORDER BY creation_date DESC';
        $req=$this->sql($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Post::CLASS);
        $posts = $req->fetchAll();
        return $posts;
    }

    public function getPost($id)
    {
        $sql = 'SELECT id,author,title,subtitle,content,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr, DATE_FORMAT(update_date,"%d/%m/%Y à %Hh%imin") AS update_date_fr FROM posts WHERE id ='.$id;
        //$sql->bindvalue(':id',(int)$id, PDO::PARAM_INT);
        $req=$this->sql($sql, [$id]);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Post::CLASS);
        $post = $req->fetch();
        return $post; 
    }

    public function addPost($post)
    {
        extract($post);
        $sql= 'INSERT INTO posts (title, subtitle, author, content, creation_date) VALUES (?,?,?,?,NOW())';
        $req = $this->sql($sql,[$title, $subtitle, $author, $content]);
    }

    /*public function addPost(post $post)
    {
        $req = $this->getDb()->prepare('INSERT INTO posts (title, subtitle, author, content, creation_date) VALUES (:title,:subtitle,:author,:content,NOW())');
        $req->bindValue(':title', $post->getTitle());
        $req->bindValue(':subtitle', $post->getSubtitle());
        $req->bindValue(':author', $post->getAuthor());
        $req->bindValue(':content', $post->getContent());
        $req->execute();
    }*/

    public function updatePost($post)
    {
        extract($post);
        $sql = 'UPDATE posts SET author=?,title=?,subtitle=?,content=?,update_date=NOW() WHERE id='.$id;
        $req = $this->sql($sql, [$author,$title, $subtitle,$content]);
    }

    public function deleteAll($id)
    {
        $sql = 'DELETE posts, comments FROM posts INNER JOIN comments ON posts.id=comments.id_post WHERE posts.id='.$id;
        $req = $this->sql($sql, [$id]);
    }

    public function deletePost($id)
    {
        $sql = 'DELETE FROM posts WHERE id='.$id;
        $req = $this->sql($sql, [$id]);
    }

    /*public function countPosts()
    {
        $req = $this->getDb()->query('SELECT COUNT(*) as nb FROM posts');
        $line = $req->fetch();
        return $line['nb'];
    }*/

    public function countPosts()
    {
        $sql = 'SELECT COUNT(*) as nb FROM posts';
        $line = $this->sql($sql)->fetch();
        return $line['nb'];
    }

    private function buildObject($row)
    {
        $post = new Post;
        $post->setId($row['id']);
        $post->setAuthor($row['author']);
        $post->setTitle($row['title']);
        $post->setSubtitle($row['subtitle']);
        $post->setContent($row['content']);
        $post->setCreation_date($row['creation_date_fr']);
        $post->setUpdate_date($row['update_date_fr']);
        return $post;
    }
}

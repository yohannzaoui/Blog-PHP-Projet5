<?php

require_once 'Models/Manager.php';
require_once 'Models/Post.php';


class PostManager extends Manager {

    public function getRecentPosts()
    {
        $posts = [];
        $req = $this->getDb()->prepare('SELECT id,author,title,subtitle,creation_date FROM posts ORDER BY creation_date DESC LIMIT 0,3');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function getListPosts()
    {
        $posts = [];
        $req = $this->getDb()->prepare('SELECT id,author,title,subtitle,creation_date FROM posts ORDER BY creation_date DESC');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function getPost($id)
    {
        $posts = [];
        $req = $this->getDb()->prepare('SELECT * FROM posts WHERE id=?');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $post = new Post($data);
        return $post;
        $req->closeCursor();
    }    
}
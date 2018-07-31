<?php

class PostManager extends Manager
{


    public function getAll()
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT * FROM posts ORDER BY id DESC');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new Post($data);
        }
        return $var;
        $req->closeCursor();
    }

    public function getRecent()
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT * FROM posts ORDER BY creation_date DESC LIMIT 0,3');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new Post($data);
        }
        return $var;
        $req->closeCursor();
    }

    public function getPost($id)
    {
        $req = $this->getDb()->prepare('SELECT * FROM posts WHERE id=?');
        $req->execute(array($_GET['id']));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $post = new Post($data);
        return $post;
        $req->closeCursor();
    }
}
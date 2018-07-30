<?php


class PostManager extends Manager {

    public function getPosts() {

        $var =[];
        $req = $this->getDb()->prepare('SELECT * FROM posts ORDER BY id DESC');
        $req->execute();
        while($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Post($data); 
        }
        return $var;
        $req->closeCursor();
    }

    public function getRecentPosts() {

        $var =[];
        $req = $this->getDb()->prepare('SELECT id,author,title,subtitle,creation_date FROM posts ORDER BY creation_date DESC LIMIT 0,3');
        $req->execute();
        while($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Post($data); 
        }
        return $var;
        $req->closeCursor();
    }
}
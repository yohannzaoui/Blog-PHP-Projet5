<?php

class PostManager extends Manager {

    public function getRecentPost() {

      $var = [];
      $req = $this->getDb()->prepare('SELECT id,author,title,subtitle,creation_date FROM posts ORDER BY creation_date DESC LIMIT 0,3');
      $req->execute();
      while($data = $req->fetch(PDO::FETCH_ASSOC)) {
          $var[] = new Post($data);
      }
      return $var;
      $req->closeCursor();
  }

    public function getListPost() {

        $var = [];
        $req = $this->getDb()->prepare('SELECT id,author,title,subtitle,creation_date FROM posts ORDER BY creation_date DESC');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Post($data);
        }
        return $var;
        $req->closeCursor();
    }

    public function getPost($id)
  {
    $req = $this->getdb()->query('SELECT * FROM posts WHERE id = '.$id);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return new Post($data);
  }
}
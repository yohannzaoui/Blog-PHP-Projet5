<?php

class PostManager extends Manager {

    public function getAll($table , $obj) {

      $var = [];
      $req = $this->getDb()->prepare('SELECT * FROM ' .$table. ' ORDER BY creation_date DESC LIMIT 0,3');
      $req->execute();
      while($data = $req->fetch(PDO::FETCH_ASSOC)) {
          $var[] = new $obj($data);
      }
      return $var;
      $req->closeCursor();
  }

  public function getPosts() {
    //$this->getBdd();
    return $this->getAll('posts', 'Post');
}
}
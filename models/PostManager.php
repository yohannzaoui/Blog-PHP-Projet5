<?php

namespace BlogModels;

require 'vendor/autoload.php';

class PostManager extends Manager {

    public function getRecentPosts() {

        $posts = [];
        $req = $this->getDb()->prepare('SELECT id,author,title,subtitle,creation_date FROM posts ORDER BY creation_date DESC LIMIT 0,3');
        $req->execute();
        while($data = $req->fetch(\PDO::FETCH_ASSOC)) {

            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function getListPosts()
    {

        $posts = [];
        $req = $this->getDb()->prepare('SELECT id,author,title,subtitle,creation_date FROM posts ORDER BY creation_date DESC');
        $req->execute();
        while($data = $req->fetch(\PDO::FETCH_ASSOC)) {

            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function post(int $id)
    {

        $posts = [];
        $req = $this->getDb()->prepare('SELECT * FROM posts WHERE id=?');
        $req->execute(array($id));
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        $post = new Post($data);
        return $post;
        $req->closeCursor();
    }

    public function newPost(Post $post)
    {
      $req=$this->getdb()->prepare('INSERT INTO posts (title,subtitle,author,content) VALUES (:title,:subtitle,:author,:content)');
      $req->bindValue(':title',htmlspecialchars($_POST['title']),\PDO::PARAM_STR);
      $req->bindValue(':subtitle',htmlspecialchars($_POST['subtitle']),\PDO::PARAM_STR);
      $req->bindValue(':author',htmlspecialchars($_POST['author']),\PDO::PARAM_STR);
      $req->bindValue(':content',htmlspecialchars($_POST['content']),\PDO::PARAM_STR);
      $req->execute();
    }
}

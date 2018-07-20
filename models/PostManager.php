<?php

class PostManager
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function setDb(PDO $db)
  {
    $this->_db=$db;
  }

  public function listPost()
 {
   $posts = [];
   $req = $this->_db->query('SELECT id,author,title,subtitle,creation_date FROM posts ORDER BY creation_date');
   while ($data = $req->fetch(PDO::FETCH_ASSOC))
   {
     $posts[] = new Post($data);
   }
   return $posts;
 }

  public function recentPost()
  {
    $posts = [];
    $req=$this->_db->query('SELECT id,author,title,subtitle,content,creation_date FROM posts ORDER BY creation_date DESC LIMIT 0,3');
    while ($data = $req->fetch(PDO::FETCH_ASSOC))
    {
      $posts[] = new Post($data);
    }
    return $posts;
  }

  public function getPost($id)
  {
    $req = $this->_db->query('SELECT * FROM posts WHERE id = '.$id);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return new Post($data);
  }

  public function addPost(Post $post)
  {
    $req=$this->_db->prepare('INSERT INTO posts (title,subtitle,author,content) VALUES (:title,:subtitle,:author,:content)');
    $req->bindValue(':title',htmlspecialchars($_POST['title']),PDO::PARAM_STR);
    $req->bindValue(':subtitle',htmlspecialchars($_POST['subtitle']),PDO::PARAM_STR);
    $req->bindValue(':author',htmlspecialchars($_POST['author']),PDO::PARAM_STR);
    $req->bindValue(':content',htmlspecialchars($_POST['content']),PDO::PARAM_STR);
    $req->execute();
  }

  public function deletePost($id)
  {
    $req=$this->_db->prepare('DELETE FROM posts WHERE id='.$id);
    $req->execute(array($id));
  }

  public function updatePost(Post $post)
  {
    $req=$this->_db->prepare('UPDATE posts SET author=:author,title=:title,subtitle=:subtitle,content=:content,update_date=NOW() WHERE id='.$_GET['id']);
    $req->bindValue(':title',htmlspecialchars($_POST['title']),PDO::PARAM_STR);
    $req->bindValue(':subtitle',htmlspecialchars($_POST['subtitle']),PDO::PARAM_STR);
    $req->bindValue(':author',htmlspecialchars($_POST['author']),PDO::PARAM_STR);
    $req->bindValue(':content',htmlspecialchars($_POST['content']),PDO::PARAM_STR);
    $req->execute();
  }
}

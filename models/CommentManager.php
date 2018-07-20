<?php

class CommentManager
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

  public function valideComment($id)
 {
   $comments = [];
   $req = $this->_db->prepare('SELECT id,id_post,pseudo,content,creation_date,publication FROM comments WHERE publication=1 AND id_post='.$id);
   $req->execute(array($id));
   while ($data = $req->fetch(PDO::FETCH_ASSOC))
   {
     $comments[] = new Comment($data);
   }
   return $comments;
 }

 public function noValideComment()
{
  $comments = [];
  $req = $this->_db->query('SELECT id,id_post,pseudo,content,creation_date,publication FROM comments WHERE publication= 0 ORDER BY creation_date DESC');
  while ($data = $req->fetch(PDO::FETCH_ASSOC))
  {
    $comments[] = new Comment($data);
  }
  return $comments;
}

  public function addComment(Comment $comment)
  {
    $req=$this->_db->prepare('INSERT INTO comments (id_post,pseudo,content,publication) VALUES (:id_post,:pseudo,:content,0)');
    $req->bindValue(':id_post',htmlspecialchars($_GET['id']),PDO::PARAM_INT);
    $req->bindValue(':pseudo',htmlspecialchars($_POST['pseudo']),PDO::PARAM_STR);
    $req->bindValue(':content',htmlspecialchars($_POST['content']),PDO::PARAM_STR);

    $req->execute();
  }

  public function deleteComment($id)
  {
    $req=$this->_db->prepare('DELETE FROM comments WHERE id='.$id);
    $req->execute(array($id));
  }

  public function validateComment($publication,$id)
  {
    $req=$this->_db->prepare('UPDATE comments SET publication=:publication WHERE id=:id');
    $req->bindValue(':id',htmlspecialchars($_GET['id']),PDO::PARAM_INT);
    $req->bindValue(':publication',htmlspecialchars($_GET['publication']),PDO::PARAM_INT);
    $req->execute();
  }
}

<?php

class CommentManager extends Manager
{
  public function getComment(){
    $req = $db->prepare('SELECT pseudo, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr, publication FROM comments WHERE id_post = ? ORDER BY creation_date DESC');
    $req->execute(array($_GET['id']));
    return $req;
  }

  public function sendComment()
  {
    $db=$this->getDb();
    $req=$db->prepare('INSERT INTO comments (id_post,pseudo,content,publication) VALUES (?,?,?,0)');
    $req->execute(array($postId, $pseudo, $content));
  }

  public function valideComment($id)
 {
   $comments = [];
   $req = $this->getDb()->prepare('SELECT * FROM comments WHERE publication=1 AND id_post='.$id);
   $req->execute(array($id));
   while ($data = $req->fetch(PDO::FETCH_ASSOC))
   {
     $comments[] = new Comment($data);
   }
   return $comments;
   $req->closeCursor();
 }
}

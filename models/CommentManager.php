<?php

class CommentManager extends Manager
{
  public function getComment(){
    $db=$this->getDb();
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
}

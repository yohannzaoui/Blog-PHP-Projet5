<?php

require_once 'Models/Manager.php';
require_once 'Models/Post.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class PostManager extends Manager {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    
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
        $req->closeCursor();
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
        $req->closeCursor();
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getPost($id) {
        $sql = 'SELECT * FROM posts WHERE id=? ';
        $post = $this->executeReq($sql, array($id));
        if ($post->rowCount() > 0)
            return $post->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$id'");
    }

    public function addPost(Post $post)
  {
    $req=$this->getDb()->prepare('INSERT INTO posts (title,subtitle,author,content) VALUES (:title,:subtitle,:author,:content)');
    $req->bindValue(':title',htmlspecialchars($_POST['title']),PDO::PARAM_STR);
    $req->bindValue(':subtitle',htmlspecialchars($_POST['subtitle']),PDO::PARAM_STR);
    $req->bindValue(':author',htmlspecialchars($_POST['author']),PDO::PARAM_STR);
    $req->bindValue(':content',htmlspecialchars($_POST['content']),PDO::PARAM_STR);
    $req->execute();
  }

}
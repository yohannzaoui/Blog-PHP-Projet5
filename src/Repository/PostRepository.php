<?php

namespace App\Repository;
use Core\DBFactory;
use App\Entity\Post;

//namespace BlogControllers;

require_once 'vendor/autoload.php';
//use BlogFramework;

//require_once 'etc/DBFactory.php';
//require_once 'src/Entity/Post.php';

class PostRepository extends DBFactory {


    public function getRecentPosts()
    {
        $posts = [];
        $req = $this->getDb()->prepare('SELECT * FROM posts ORDER BY creation_date DESC LIMIT 0,3');
        $req->execute();
        while($data = $req->fetch(\PDO::FETCH_ASSOC)) {

            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function getAll()
    {
        $posts = [];
        $req = $this->getDb()->prepare('SELECT * FROM posts ORDER BY creation_date DESC');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {

            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function post(int $idPost)
    {
        $posts = [];
        $req = $this->getDb()->prepare('SELECT * FROM posts WHERE id=?');
        $req->execute(array($idPost));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $post = new Post($data);
        return $post;
        $req->closeCursor();
    }

    /**
     * Renvoie le nombre total de billets
     *
     * @return int Le nombre de billets
     */
    public function getNombreBillets()
    {
        $sql = 'select count(*) as nbBillets from T_BILLET';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbBillets'];
    }
}

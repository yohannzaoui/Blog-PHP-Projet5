<?php

namespace App\repository;

use Core\DBFactory;
use App\entity\Post;

class PostRepository extends DBFactory
{
    public function getRecentPosts()
    {
        $sql= 'SELECT id,author,title,subtitle,content,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr, DATE_FORMAT(update_date,"%d/%m/%Y à %Hh%imin") AS update_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0,3';
        $result = $this->sql($sql);
        $posts = [];
        foreach ($result as $row) {
            $postId = $row['id'];
            $posts[$postId] = $this->buildObject($row);
        }
        return $posts;
    }

    public function getAll()
    {
        $sql= 'SELECT id,author,title,subtitle,content,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr, DATE_FORMAT(update_date,"%d/%m/%Y à %Hh%imin") AS update_date_fr FROM posts ORDER BY creation_date DESC';
        $result = $this->sql($sql);
        $posts = [];
        foreach ($result as $row) {
            $postId = $row['id'];
            $posts[$postId] = $this->buildObject($row);
        }
        return $posts;
    }

    public function getPost($id)
    {
        $sql = 'SELECT id,author,title,subtitle,content,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr, DATE_FORMAT(update_date,"%d/%m/%Y à %Hh%imin") AS update_date_fr FROM posts WHERE id = ?';
        $result = $this->sql($sql, [$id]);
        $row = $result->fetch();
        if($row){
            return $this->buildObject($row);
        } else {
            echo "Aucun article existant avec cet identifiant";
        }
        return $result;
    }

    public function addPost($post)
    {
        extract($post);
        $sql = 'INSERT INTO posts (title, subtitle, author, content, creation_date) VALUES (?,?,?,?,NOW())';
        $this->sql($sql, [$title, $subtitle, $author, $content]);
    }

    public function updatePost($post)
    {
        extract($post);
        $sql = 'UPDATE posts SET author=?,title=?,subtitle=?,content=?,update_date=NOW() WHERE id='.$id;
        $this->sql($sql, [$author,$title, $subtitle,$content]);
    }

    public function deleteAll($id)
    {
        $sql = 'DELETE posts, comments FROM posts INNER JOIN comments ON posts.id=comments.id_post WHERE posts.id='.$id;
        $this->sql($sql, [$id]);
    }

    public function deletePost($id)
    {
        $sql = 'DELETE FROM posts WHERE id='.$id;
        $this->sql($sql, [$id]);
    }

    public function countPosts()
    {
        $sql = 'SELECT COUNT(*) as nb FROM posts';
        $data=$this->sql($sql);
        $line = $data->fetch();
        return $line['nb'];
    }

    private function buildObject($row)
    {
        $post = new Post;
        $post->setId($row['id']);
        $post->setAuthor($row['author']);
        $post->setTitle($row['title']);
        $post->setSubtitle($row['subtitle']);
        $post->setContent($row['content']);
        $post->setCreation_date($row['creation_date_fr']);
        $post->setUpdate_date($row['update_date_fr']);
        return $post;
    }
}

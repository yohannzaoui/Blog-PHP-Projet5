<?php

namespace App\controller;

use App\repository\PostRepository;
use App\repository\CommentRepository;
use Core\View;

class FrontController
{
    private $postRepository;
    private $commentRepository;
    private $view;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->commentRepository = new CommentRepository;
        $this->view = new View;
    }

    public function home()
    {
        $posts = $this->postRepository->getRecentPosts();
        $this->view->render('home', ['posts'=> $posts]);
    }

    public function all()
    {
        $posts = $this->postRepository->getAll();
        $this->view->render('all', ['posts'=> $posts]);
    }

    public function post($idPost)
    {
        $post = $this->postRepository->getPost($idPost);
        $comments = $this->commentRepository->getCommentsFromPost($idPost);
        $this->view->render('post', ['post'=>$post, 'comments'=>$comments]);
    }

    public function saveComment($comment)
     {
        if(isset($comment['submit'])) {
            $commentRepo = $this->commentRepository->addComment($comment);
            header('Location: ../public/index.php?route=post&id='.$_POST['idPost']);
        }
        $this->view->render('post', ['comment'=>$comment]);
     }
}

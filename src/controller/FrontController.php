<?php

namespace App\controller;

use App\repository\PostRepository;
use App\repository\CommentRepository;
use App\Repository\UserRepository;
use Core\View;


class FrontController
{
    private $postRepository;
    private $commentRepository;
    private $userRepository;
    private $view;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->commentRepository = new CommentRepository;
        $this->userRepository = new UserRepository;
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
        if(isset($comment['submit']) && !empty($comment['pseudo']) && !empty($comment['content'])) {
            $commentRepo = $this->commentRepository->addComment($comment);
            header('Location: ../index.php?route=post&id='.$_POST['idPost']);
        }
     }

     public function connexionPage()
     {
         $this->view->render('connexionPage');
     }

     public function registrationPage()
     {
         $this->view->render('registrationPage');
     }

     public function addUser($user)
     {
        if(isset($user['submit'])){
            if(!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass1'])){
                if($_POST['pass'] == $_POST['pass1']){
                    $passhash = password_hash($_POST['pass'], PASSWORD_BCRYPT);
                    $userRepo = $this->userRepository->addUser($user,$passhash);
                    header('Location: ../index.php?route=connexionPage');
                }
            }
        }
     }
}

<?php

namespace App\controller;

use App\repository\PostRepository;
use App\repository\CommentRepository;
use App\Repository\UserRepository;
use Core\View;
use Exception;


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
        if(isset($comment['submit']) && $comment['submit'] === 'send' && !empty($comment['pseudo']) && !empty($comment['content'])) {
            $commentRepo = $this->commentRepository->addComment($comment);
            header('Location: ../index.php?route=post&id='.$_POST['idPost']);
        }else {
            throw new Exception('Tous les champs doivent être remplis');
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
        if(isset($user['submit']) && $user['submit'] === 'send'){
            if(!empty($user['pseudo']) && !empty($user['pass']) && !empty($user['pass1'])){
                if($user['pass'] === $user['pass1']){
                    $passhash = password_hash($user['pass'], PASSWORD_BCRYPT);
                    $userRepo = $this->userRepository->addUser($user,$passhash);
                    header('Location: ../index.php?route=connexionPage');
                } else {
                    throw new Exception('Les mots de passes ne sont pas identique');
                }
            } else {
                throw new Exception('Tous les champs doivent être remplis');
            }
        } else {
            throw new Exception('Le paramètre envoyé est incorrect');
        }
     }

     /*public function userConnexionn($user)
     {
         if(isset($user['submit']) && $user['submit'] === 'send' && !empty($_POST['pseudo']) && !empty($_POST['pass'])){
            $passhash = password_verify($_POST['pass'],PASSWORD_BCRYPT);
            $userRepo = $this->userRepository->userConnect($user,$passhash);
            header('Location: ../index.php?route=all');
         }
         /*else {
            header('Location: ../index.php?route=all');
         }
     }*/

     public function userConnexion($user)
     {
         if(isset($user['submit']) && $user['submit'] === 'send') {
             if(!empty($user['pseudo']) && !empty($user['pass'])){
                $userRepo = $this->userRepository->userConnect($user);
                header('Location: ../index.php?route=all');
             } else {
                throw new Exception('Tous les champs doivent être remplis');
             }
         } else {
            throw new Exception('Le paramètre envoyé est incorrect');
         }
     }
}

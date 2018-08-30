<?php

namespace App\controller;

use App\repository\PostRepository;
use App\repository\CommentRepository;
use App\Repository\UserRepository;
use Core\View;
use Core\Session;
use Exception;


class FrontController
{
    private $postRepository;
    private $commentRepository;
    private $userRepository;
    private $view;
    private $session;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->commentRepository = new CommentRepository;
        $this->userRepository = new UserRepository;
        $this->view = new View;
        $this->session = new Session;
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
        $this->view->render('post', ['post'=> $post, 'comments'=>$comments]);
    }

    public function saveComment()
     {
        if(isset($_POST['submit']) && $_POST['submit'] === 'send' && !empty($_POST['pseudo']) && !empty($_POST['content']) && !empty($_POST['idPost'])) {
            $pseudo = $this->view->check($_POST['pseudo']);
            $content = $this->view->check($_POST['content']);
            $idPost = $this->view->check($_POST['idPost']);
            $this->commentRepository->addComment($idPost, $pseudo, $content);
            $this->session->setFlash('Votre commentaire à été envoyé. Il sera affiché après validation.');
            header('Location: ../index.php?route=post&id='.$idPost);
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

     public function addUser()
     {
        if(isset($_POST['submit']) && $_POST['submit'] === 'send'){
            if(!empty($_POST['pseudo']) && preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass1']) && !empty($_POST['email'])){
                if($_POST['pass'] === $_POST['pass1']){
                    $pseudo = $this->view->check($_POST['pseudo']);
                    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                    //$token = str_random(60);
                    $hash = $this->view->check($_POST['pass']);
                    $passhash = password_hash($hash, PASSWORD_BCRYPT);
                    $this->userRepository->addUser($pseudo,$email,$passhash);
                    header('Location: ../index.php?route=connexionPage');
                } else {
                    throw new Exception('Les mots de passes ne sont pas identique');
                }
            } else {
                throw new Exception('Tous les champs doivent être remplis / Votre pseudo doit contenir seulement des lettres (miniscules et/ou majuscules), des chiffres et le signe _ "underscore".');
            }
        } else {
            throw new Exception('Le paramètre envoyé est incorrect');
        }
     }

     public function userConnexion()
     {
         if(isset($_POST['submit']) && $_POST['submit'] === 'send') {
             if(!empty($_POST['pseudo']) && !empty($_POST['pass'])){
                $pseudo = $this->view->check($_POST['pseudo']);
                $pass = $this->view->check($_POST['pass']);
                $user = $this->userRepository->userConnect($pseudo, $pass);
                $this->session->setSession('roleUser', $user['role']);
                $this->session->setSession('pseudoUser', $user['pseudo']);
             } else {
                throw new Exception('Tous les champs doivent être remplis');
             }
         } else {
            throw new Exception('Le paramètre envoyé est incorrect');
         }
     }

     public function deconnexionUser()
     {
         $this->session->sessionDestroy();
         header('Location: ../index.php?route=connexionPage');
     }

     private function str_random($length)
    {
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }


    //mail($email,"Bonjour, pour valider votre compte merci de cliquer sur ce lien\n\n http://blog/index.php?route=connexionPage");
}

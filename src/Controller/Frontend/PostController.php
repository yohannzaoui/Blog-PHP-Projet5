<?php

namespace App\controller\frontend;

use App\repository\PostRepository;
use App\repository\CommentRepository;
use Core\View;
use Core\Session;
use Exception;

class PostController
{
    private $postRepository;
    private $commentRepository;
    private $view;
    private $session;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->commentRepository = new CommentRepository;
        $this->view = new View;
        $this->session = new Session;
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
            $this->session->flash('Votre commentaire à été envoyé. Il sera affiché après validation.');
            header('Location: ../index.php?route=post&id='.$idPost);
        }else {
            throw new Exception('Tous les champs doivent être remplis');
        }
     }
}
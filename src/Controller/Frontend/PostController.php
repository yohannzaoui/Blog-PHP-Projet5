<?php

namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\PostControllerInterface;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;
use Core\View;
use Core\Session;
use Exception;

/**
 *
 */
class PostController implements PostControllerInterface
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
        $this->view->render('post','frontend', ['post'=> $post, 'comments'=>$comments]);
    }

    public function saveComment()
    {
        if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
            if (empty($_POST['pseudo']) && empty($_POST['content']) && empty($_POST['idPost'])) {
                throw new Exception('Tous les champs doivent être remplis');
            }
                $pseudo = $this->view->check($_POST['pseudo']);
                $content = $this->view->check($_POST['content']);
                $idPost = $this->view->check($_POST['idPost']);
                $this->commentRepository->addComment($idPost, $pseudo, $content);
                $this->session->flash('Votre commentaire à été envoyé. Il sera affiché après validation.');
                header('Location: ../index.php?route=post&id='.$idPost);
        }
            throw new Exception('Paramètre incorrect');
     }
}

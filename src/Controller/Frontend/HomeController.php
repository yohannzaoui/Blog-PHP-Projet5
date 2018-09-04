<?php

namespace App\controller\frontend;

use Core\View;
use Core\Mailer;
use Core\Session;
use App\repository\PostRepository;
use Execption;

/**
 *
 */
class HomeController
{
    
    private $postRepository;
    private $view;
    private $session;
    private $mailer;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->view = new View;
        $this->session = new Session;
        $this->mailer = new Mailer;
    }

    public function home()
    {
        $posts = $this->postRepository->getRecentPosts();
        $this->view->render('home','frontend', ['posts'=> $posts]);
    }

    public function contact()
    {
        if(isset($_POST['submit']) && $_POST['submit'] === "send") {
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
                $pseudo = $this->view->check($_POST['name']);
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $body = $this->view->check($_POST['message']);
                $this->mailer->send($pseudo,$email,$body);
                $this->session->flash('Votre message à bien été envoyé');
                header('Location:index.php');
            } else {
                throw new Execption('Les champs sont vides');
            }
        } else {
            throw new Execption('Le paramétre envoyé est invalide');
        }
    }
}

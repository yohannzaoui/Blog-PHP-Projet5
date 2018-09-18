<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\HomeControllerInterface;
use Core\Request;
use Core\View;
use Core\Mailer;
use App\Repository\PostRepository;

/**
 *
 */
class HomeController implements HomeControllerInterface
{

    private $postRepository;
    private $view;
    private $mailer;

    /**
     * 
     */
    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->view = new View;
        $this->mailer = new Mailer;
    }

    /**
     * 
     */
    public function __invoke(request $request)
    {
        if ($request->isMethod('POST')) {
            if (isset($_POST['submit']) && $_POST['submit'] === "send") {
                if (empty($_POST['name']) && empty($_POST['email']) && empty($_POST['message'])) {
                    $this->view->render('error', 'error', ['error' => 'Les champs sont vides']);
                }
                    $pseudo = $this->view->check($_POST['name']);
                    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                    $body = $this->view->check($_POST['message']);
                    $this->mailer->send('Message du Blog', $pseudo, $email, $body);
                    $request->getSession()->flash('Votre message à bien été envoyé');
                    $posts = $this->postRepository->getRecentPosts();
                    $this->view->render('home', 'frontend', ['posts' => $posts]);
                } else {
                    $this->view->render('error', 'error', ['error' => 'Le paramétre envoyé est invalide']);
                }
            } else {
                $posts = $this->postRepository->getRecentPosts();
                $this->view->render('home', 'frontend', ['posts' => $posts]);
            }
    }
}

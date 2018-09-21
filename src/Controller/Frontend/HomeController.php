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

    /**
     * 
     */
    private $postRepository;

    /**
     * 
     */
    private $view;

    /**
     * 
     */
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
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->has('submit') && $request->getRequest('submit') === "send") {
                if (empty($request->getRequest('name')) && empty($request->getRequest('email')) && empty($request->getRequest('message'))) {
                    $this->view->render('error', 'error', ['error' => 'Les champs sont vides']);
                }
                    $pseudo = $this->view->check($request->getRequest('name'));
                    $email = filter_var($request->getRequest('email'), FILTER_VALIDATE_EMAIL);
                    $body = $this->view->check($request->getRequest('message'));
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

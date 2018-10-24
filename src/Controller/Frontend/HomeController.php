<?php

namespace App\Controller\Frontend;

use Core\View;
use Core\Mailer;
use Core\Request;
use Core\Response;
use App\Repository\PostRepository;
use App\Controller\Frontend\Interfaces\HomeControllerInterface;


/**
 * Class HomeController
 * @package App\Controller\Frontend
 */
class HomeController implements HomeControllerInterface
{


    /**
     * @var PostRepository
     */
    private $postRepository;


    /**
     * @var View
     */
    private $view;


    /**
     * @var Mailer
     */
    private $mailer;


    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->view = new View;
        $this->mailer = new Mailer;
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->has('submit') && $request->getRequest('submit') === "send") {
                if (empty($request->getRequest('name')) && empty($request->getRequest('email')) && empty($request->getRequest('message'))) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Les champs sont vides']));
                }
                    $pseudo = $this->view->check($request->getRequest('name'));
                    $email = filter_var($request->getRequest('email'), FILTER_VALIDATE_EMAIL);
                    $body = $this->view->check($request->getRequest('message'));
                    $this->mailer->send('Message du Blog', $pseudo, $email, $body);
                    $request->getSession()->flash('Votre message à bien été envoyé');
                    $posts = $this->postRepository->getRecentPosts();
                    return new Response(200, [], $this->view->render('home', 'frontend', ['posts' => $posts]));
                } else {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Le paramétre envoyé est invalide']));
                }
            } else {
                $posts = $this->postRepository->getRecentPosts();
                return new Response(200, [], $this->view->render('home', 'frontend', ['posts' => $posts]));
            }
    }
}

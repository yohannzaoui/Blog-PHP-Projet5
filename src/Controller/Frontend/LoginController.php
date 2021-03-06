<?php

namespace App\Controller\Frontend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Controller\Frontend\Interfaces\LoginControllerInterface;


/**
 * Class LoginController
 * @package App\Controller\Frontend
 */
class LoginController implements LoginControllerInterface
{


    /**
     * @var View
     */
    private $view;


    /**
     * @var PostRepository
     */
    private $postRepository;


    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->view = new View;
        $this->postRepository = new PostRepository;
        $this->userRepository = new UserRepository;
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->has('submit') && $request->getRequest('submit') === "send") {
                if (empty($request->getRequest('pseudo')) && empty($request->getRequest('pass'))) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error'=>'Tous les champs doivent être complétés']));
                } else {
                    $pseudo = $this->view->check($request->getRequest('pseudo'));
                    $pass = $this->view->check($request->getRequest('pass'));
                    try {
                        $user = $this->userRepository->userConnect($pseudo, $pass);
                    } catch (\Exception $e) {
                        return new Response(200, [], $this->view->render('error', 'error', ['error' => $e->getMessage()]));
                    }
                    $request->getSession()->add('roleUser', $user['role']);
                    $request->getSession()->add('pseudoUser', $user['pseudo']);
                }
                header('location:../allPosts');
            } else {
                return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Le paramètre envoyé est incorrect']));
            }
        } else {
            return new Response(200, [], $this->view->render('loginUser', 'frontend'));
            }
        }
}

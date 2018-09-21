<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\LoginControllerInterface;
use App\Repository\UserRepository;
use App\Repository\PostRepository;
use Core\View;
use Core\Request;

/**
 *
 */
class LoginController implements LoginControllerInterface
{

    /**
     * 
     */
    private $view;

    /**
     * 
     */
    private $postRepository;

    /**
     * 
     */
    private $userRepository;

    /**
     * 
     */
    public function __construct()
    {
        $this->view = new View;
        $this->postRepository = new PostRepository;
        $this->userRepository = new UserRepository;
    }

    /**
     * 
     */
    public function __invoke(request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->has('submit') && $request->getRequest('submit') === "send") {
                if (empty($request->getRequest('pseudo')) && empty($request->getRequest('pass'))) {
                    $this->view->render('error', 'error', ['error'=>'Tous les champs doivent être complétés']);
                } else {
                    $pseudo = $this->view->check($request->getRequest('pseudo'));
                    $pass = $this->view->check($request->getRequest('pass'));
                    $user = $this->userRepository->userConnect($pseudo, $pass);
                    $request->getSession()->add('roleUser', $user['role']);
                    $request->getSession()->add('pseudoUser', $user['pseudo']);
                }
                header('location:../allPosts');
            } else {
                $this->view->render('error', 'error', ['error' => 'Le paramètre envoyé est incorrect']);
            }
        } else {
            $this->view->render('loginUser', 'frontend');
            }
        }
}

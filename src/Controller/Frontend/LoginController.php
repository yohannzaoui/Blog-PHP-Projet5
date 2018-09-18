<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\LoginControllerInterface;
use App\Repository\UserRepository;
use App\Repository\PostRepository;
use Core\View;
use Core\Request;
use Core\Cookie;

/**
 *
 */
class LoginController implements LoginControllerInterface
{

    private $view;
    private $postRepository;
    private $userRepository;
    private $cookie;

    /**
     * 
     */
    public function __construct()
    {
        $this->view = new View;
        $this->postRepository = new PostRepository;
        $this->userRepository = new UserRepository;
        $this->cookie  = new Cookie;
    }

    /**
     * 
     */
    public function __invoke(request $request)
    {
        if ($request->isMethod('POST')) {
            if (isset($_POST['submit']) && $_POST['submit'] === "send") {
                if (empty($_POST['pseudo']) && empty($_POST['pass'])) {
                    $this->view->render('error', 'error', ['error'=>'Tous les champs doivent être complétés']);
                } else {
                    $pseudo = $this->view->check($_POST['pseudo']);
                    $pass = $this->view->check($_POST['pass']);
                    $user = $this->userRepository->userConnect($pseudo, $pass);
                    $request->getSession()->add('roleUser', $user['role']);
                    $request->getSession()->add('pseudoUser', $user['pseudo']);
                }
                if (isset($_POST['remember'])) {
                    $this->cookie->set('pseudoUser', $pseudo);
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

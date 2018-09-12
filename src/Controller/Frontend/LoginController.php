<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\LoginControllerInterface;
use App\Repository\UserRepository;
use Core\View;
use Core\Request;
use Core\Session;
use Core\Cookie;

/**
 *
 */
class LoginController implements LoginControllerInterface
{

    private $view;
    private $userRepository;
    private $session;
    private $cookie;

    public function __construct()
    {
        $this->view = new View;
        $this->userRepository = new UserRepository;
        $this->session = new Session;
        $this->cookie = new Cookie;
    }

    public function __invoke(request $request)
    {
        if ($request->isMethod('POST')) {
            if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
                if (empty($_POST['pseudo']) && empty($_POST['pass'])) {
                    $this->view->render('error', 'error', ['error'=>'Tous les champs doivent être remplis']);
                } else {
                    $pseudo = $this->view->check($_POST['pseudo']);
                    $pass = $this->view->check($_POST['pass']);
                    $user = $this->userRepository->userConnect($pseudo, $pass);
                    $this->session->add('roleUser', $user['role']);
                    $this->session->add('pseudoUser', $user['pseudo']);
                }
                if (isset($_POST['remember'])) {
                    $this->cookie->set('pseudoUser', $pseudo);
                    }
                } else {
                    $this->view->render('error', 'error', ['error'=>'Le paramètre envoyé est incorrect']);
            }
        } else {
            $this->view->render('loginUser', 'frontend');
        }
    }
}

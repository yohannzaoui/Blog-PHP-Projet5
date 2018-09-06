<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\LoginControllerInterface;
use App\Repository\UserRepository;
use Core\View;
use Core\Session;
use Core\Cookie;
use Exception;

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

    public function loginPage()
    {
        $this->view->render('loginUser', 'frontend');
    }

    public function userConnexion()
    {
        if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
            if (empty($_POST['pseudo']) && empty($_POST['pass'])) {
                throw new Exception('Tous les champs doivent être remplis');
            }
                $pseudo = $this->view->check($_POST['pseudo']);
                $pass = $this->view->check($_POST['pass']);
                $user = $this->userRepository->userConnect($pseudo, $pass);
                $this->session->add('roleUser', $user['role']);
                $this->session->add('pseudoUser', $user['pseudo']);

            if (isset($_POST['remember'])) {
                $this->cookie->set('pseudoUser', $pseudo);
            }
        }
           throw new Exception('Le paramètre envoyé est incorrect');
    }
}

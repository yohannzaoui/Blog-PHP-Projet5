<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\LoginControllerInterface;
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

    private $userRepository;
    private $view;
    private $session;
    private $cookie;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->view = new View;
        $this->session = new Session;
        $this->cookie = new Cookie;
    }

    public function admin()
    {
        if (!isset($_SESSION['pseudoAdmin'], $_SESSION['roleAdmin'])) {
            $this->view->render('loginAdmin', 'backend');
        }
            $this->view->render('addPost', 'backend');
    }

    public function adminConnect()
    {
        if (isset($_POST['submit']) && $_POST['submit'] === "send") {
            if (empty($_POST['pseudo']) && empty($_POST['pass'])) {
                throw new Exception('Tous les champs doivent être complétés');
            }
                $pseudo = $this->view->check($_POST['pseudo']);
                $pass = $this->view->check($_POST['pass']);
                $user = $this->userRepository->adminConnect($pseudo, $pass);
                $this->session->add('roleAdmin', $user['role']);
                $this->session->add('pseudoAdmin', $user['pseudo']);

            if (isset($_POST['remember'])) {
                $this->cookie->set('pseudoAdmin', $pseudo);
            }
        }
            throw new Exception('Le paramètre envoyé est incorrect');
    }
}

<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\LoginControllerInterface;
use App\Repository\UserRepository;
use Core\Request;
use Core\View;
use Core\Cookie;

/**
 *
 */
class LoginController implements LoginControllerInterface
{

    private $userRepository;
    private $view;
    private $cookie;

    /**
     * 
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->view = new View;
        $this->cookie = new Cookie;
    }

    /**
     * 
     */
    public function __invoke(request $request)
    {
        if ($request->isMethod('POST')) {
            if (isset($_POST['submit']) && $_POST['submit'] === "send") {
                if (empty($_POST['pseudo']) && empty($_POST['pass'])) {
                    $this->view->render('error', 'error', ['error' => 'Tous les champs doivent être complétés']);
                } else {
                    $pseudo = $this->view->check($_POST['pseudo']);
                    $pass = $this->view->check($_POST['pass']);
                    $user = $this->userRepository->adminConnect($pseudo, $pass);
                    $request->getSession()->add('roleAdmin', $user['role']);
                    $request->getSession()->add('pseudoAdmin', $user['pseudo']);
                }
                if (isset($_POST['remember'])) {
                    $this->cookie->set('pseudoAdmin', $pseudo);
                }
                $this->view->render('addPost', 'backend');
            } else {
                $this->view->render('error', 'error', ['error' => 'Le paramètre envoyé est incorrect']);
            }
        } else {
            if (!isset($_SESSION['pseudoAdmin'], $_SESSION['roleAdmin'])) {
                $this->view->render('loginAdmin', 'backend');
            } else {
                $this->view->render('addPost', 'backend');
                }
            }
        }
    }

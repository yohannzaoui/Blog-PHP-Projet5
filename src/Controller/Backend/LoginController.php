<?php

namespace App\controller\backend;

use App\Repository\UserRepository;
use Core\View;
use Core\Session;
use Exception;

class LoginController
{
    private $userRepository;
    private $view;
    private $session;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->view = new View;
        $this->session = new Session;
    }

    public function admin()
    {
        if(!isset($_SESSION['pseudoAdmin'], $_SESSION['roleAdmin'])) {
            $this->view->render('loginAdmin');
        } else {
            $this->view->render('addPost');
        }
    }

    public function adminConnect()
    {
        if (isset($_POST['submit']) && $_POST['submit'] === "send"){
            if(!empty($_POST['pseudo']) && !empty($_POST['pass'])){
                $pseudo = $this->view->check($_POST['pseudo']);
                $pass = $this->view->check($_POST['pass']);
                $user = $this->userRepository->adminConnexion($pseudo, $pass);
                $this->session->setSession('roleAdmin', $user['role']);
                $this->session->setSession('pseudoAdmin', $user['pseudo']);
            } else {
                throw new Exception('Tous les champs doivent être remplis');
            }
        } else {
            throw new Exception('Le paramètre envoyé est incorrect');
        }
    }
}

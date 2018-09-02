<?php

namespace App\controller\frontend;

use App\Repository\UserRepository;
use Core\View;
use Core\Session;
use Exception;

class LoginController
{
    private $view;
    private $userRepository;
    private $session;

    public function __construct()
    {
        $this->view = new View;
        $this->userRepository = new UserRepository;
        $this->session = new Session;
    }

    public function loginPage()
    {
        $this->view->render('loginUser','frontend');
    }

    public function userConnexion()
    {
        if(isset($_POST['submit']) && $_POST['submit'] === 'send') {
            if(!empty($_POST['pseudo']) && !empty($_POST['pass'])){
               $pseudo = $this->view->check($_POST['pseudo']);
               $pass = $this->view->check($_POST['pass']);
               $user = $this->userRepository->userConnect($pseudo, $pass);
               $this->session->add('roleUser', $user['role']);
               $this->session->add('pseudoUser', $user['pseudo']);
            } else {
               throw new Exception('Tous les champs doivent être remplis');
            }
        } else {
           throw new Exception('Le paramètre envoyé est incorrect');
        }
    }

    public function confirmation($id,$token)
    {
        if (isset($_GET['token'], $_GET['id']) && !empty($_GET['token']) && !empty($_GET['id'])) {
            $token = $this->view->check($_GET['token']);
            $id = $this->view->check($_GET['id']);
            $this->userRepository->confirme($id,$token);
            $this->view->render('confirmation','frontend');
        }
    }
}

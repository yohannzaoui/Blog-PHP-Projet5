<?php

namespace App\controller\backend;

use App\Repository\UserRepository;
use Core\View;
use Core\Mailer;
use Exception;

class RegisterController
{
    private $view;
    private $userRepository;
    private $mailer;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->view = new View;
        $this->mailer = new Mailer;
    }

    public function registration()
    {
        $this->view->render('registerAdmin','backend');
    }

    public function addAdmin()
    {
        if(isset($_POST['submit']) && $_POST['submit'] === "send"){
            if(empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])){
                throw new Exception('Votre pseudo doit contenir seulement des lettres (miniscules et/ou majuscules), des chiffres et le signe _ "underscore".');
            } else {
                $pseudo = $this->view->check($_POST['pseudo']);
            }
            if(empty($_POST['pass']) && empty($_POST['pass1'])){
                throw new Exception('Les champs mot de passe sont vide');
            } elseif ($_POST['pass'] === $_POST['pass1']) {
                $hash = $this->view->check($_POST['pass']);
                $passhash = password_hash($hash, PASSWORD_BCRYPT);
            } else {
                throw new Exception('Les mots de passes ne sont pas identiques');
            }
            if(empty($_POST['email'])) {
                throw new Exception('Veuillez entrer votre adresse email');
            } else {
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $token = $this->mailer->token($email);
                $this->userRepository->addAdmin($pseudo,$passhash,$email,$token);
                $this->mailer->send($pseudo, $email,"Veuillez confirmez votre compte en cliquant sur ce lien\n\n http://blog/index.php?route=confirmation&token=$token");
                $this->view->render('validation','frontend');
            }
        } else {
            throw new Exception("Le paramétre d'envoi est absent");
        }
    }
}

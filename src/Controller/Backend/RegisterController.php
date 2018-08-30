<?php

namespace App\controller\backend;

use Core\View;
use App\Repository\UserRepository;
use Exception;

class RegisterController
{
    private $view;
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->view = new View;
    }

    public function registration()
    {
        $this->view->render('registerAdmin');
    }

    public function addAdmin()
    {
        if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
            if (!empty($_POST['pseudo']) && preg_match('/^[a-zA-Z09_]+$/', $_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass1']) && !empty($_POST['email'])) {
                if ($_POST['pass'] === $_POST['pass1']) {
                    $pseudo = $this->view->check($_POST['pseudo']);
                    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                    $hash = $this->view->check($_POST['pass']);
                    $passhash = password_hash($hash, PASSWORD_BCRYPT);
                    $this->userRepository->addAdmin($pseudo, $passhash, $email);
                    header('Location: ../index.php?route=loginAdmin');
                } else {
                    throw new Exception('Les mots de passes ne correspondent pas');
                }
            } else {
                throw new Exception('Tous les champs doivent être remplis / Votre pseudo doit contenir seulement des lettres (miniscules et/ou majuscules), des chiffres et le signe _ "underscore".');
            }
        } else {
            throw new Exception('Le paramètre envoyé est incorrect');
        }
    }
}

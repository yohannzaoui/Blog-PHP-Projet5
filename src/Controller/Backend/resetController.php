<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\ResetControllerInterface;
use Core\View;
use Core\Mailer;
use App\Repository\UserRepository;
use Exception;

/**
 *
 */
class ResetController implements ResetControllerInterface
{

    private $userRepository;
    private $mailer;
    private $view;

    public function __construct()
    {
        $this->userRepository = new userRepository;
        $this->mailer = new Mailer;
        $this->view = new View;
    }

    public function resetUser()
    {
        $this->view->render('resetUser', 'frontend');
    }

    public function resetAdmin()
    {
        $this->view->render('resetAdmin', 'backend');
    }

    public function passwordResetUser()
    {
        $this->view->render('passwordResetUser', 'frontend');
    }

    public function passwordResetAdmin()
    {
        $this->view->render('passwordResetAdmin', 'backend');
    }

    public function resetUserInfo()
    {
        if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
            if (empty($_POST['email'])) {
                throw new Exception("Le champ adresse Email est vide");
            } else {
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $token = $this->mailer->token($email);
                $user = $this->userRepository->resetUser($token);
                $this->mailer->send('Récuperation de votre mot de passe', $user['pseudo'], $email, "Pour réinitialiser votre mot de passe cliquez sur ce lien\n\n http://blog/index.php?route=passwordResetUser&id=".$user['id']."&token=$token");
                $this->view->render('validation_reset', 'backend');
            }
        } else {
            throw new Exception("Paramètre absent");
        }
    }

    public function resetAdminInfo()
    {
        if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
            if (empty($_POST['email'])) {
                throw new Exception("Le champ adresse Email est vide");
            } else {
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $token = $this->mailer->token($email);
                $user = $this->userRepository->resetAdmin($token);
                $this->mailer->send('Récuperation de votre mot de passe', $user['pseudo'], $email, "Pour réinitialiser votre mot de passe cliquez sur ce lien\n\n http://blog/index.php?route=passwordResetAdmin&id=".$user['id']."&token=$token");
                $this->view->render('validation_reset', 'backend');
            }
        } else {
            throw new Exception("Paramètre absent");
        }
    }

    public function passwordReset()
    {
        if (isset($_POST['submit']) && $_POST['submit'] === 'send' && !empty($_POST['id']) && !empty($_POST['token'])) {
            if (empty($_POST['pass1']) && $_POST['pass2']) {
                throw new Exception("Veuillez reseigner votre nouveau mot de passe");
            } elseif($_POST['pass1'] === $_POST['pass2']) {
                $id = $this->view->check($_POST['id']);
                $pass = $this->view->check($_POST['pass1']);
                $passhash = password_hash($pass, PASSWORD_BCRYPT);
                $this->userRepository->resetUserPass($id,$passhash);
                $this->view->render('confirmation_reset', 'backend');
            } else {
                throw new Exception("Les mots de passe doivent être identique");
            }
        } else {
            throw new Exception("Paramètre absent");
        }
    }
}

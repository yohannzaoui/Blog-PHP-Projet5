<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\PasswordUserControllerInterface;
use Core\View;
use Core\Request;


/**
 *
 */
class PasswordUserController implements PasswordUserControllerInterface
{

    private $view;

    public function __construct()
    {
        $this->view = new View;
    }

    public function __invoke(request $request)
    {
        if ($request->isMethod('POST')) {
            if (isset($_POST['submit']) && $_POST['submit'] === 'send' && !empty($_POST['id']) && !empty($_POST['token'])) {
                if (empty($_POST['pass1']) && $_POST['pass2']) {
                    $this->view->render('error', 'error', ['error'=>'Veuillez reseigner votre nouveau mot de passe']);
                } elseif($_POST['pass1'] === $_POST['pass2']) {
                    $id = $this->view->check($_POST['id']);
                    $pass = $this->view->check($_POST['pass1']);
                    $passhash = password_hash($pass, PASSWORD_BCRYPT);
                    $this->userRepository->resetUserPass($id,$passhash);
                    $this->view->render('confirmation_reset', 'backend');
                } else {
                    $this->view->render('error', 'error', ['error'=>'Les mots de passe doivent être identique']);
                }
            } else {
                $this->view->render('error', 'error', ['error'=>'Paramètre absent']);
            }
        } else {
            $this->view->render('passwordResetUser', 'frontend');
        }
    }
}

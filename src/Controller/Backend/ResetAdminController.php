<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\ResetAdminControllerInterface;
use App\Repository\userRepository;
use Core\View;
use Core\Request;
use Core\Mailer;

class ResetAdminController implements ResetAdminControllerInterface
{
    private $view;
    private $mailer;
    private $userRepository;

    /**
     * 
     */
    public function __construct()
    {
        $this->view = new View;
        $this->mailer = new Mailer;
        $this->userRepository = new userRepository;
    }

    /**
     * 
     */
    public function __invoke(request $request)
    {
        if ($request->isMethod('POST')) {
            if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
                if (empty($_POST['email'])) {
                    $this->view->render('error', 'error', ['error' => 'Le champ adresse Email est vide']);
                } else {
                    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                    $token = $this->mailer->token($email);
                    $user = $this->userRepository->resetAdmin($token);
                    $this->mailer->send('Récuperation de votre mot de passe', $user['pseudo'], $email, "Pour réinitialiser votre mot de passe cliquez sur ce lien\n\n http://siteweb/passwordResetAdmin/".$user['id']."/$token");
                    $this->view->render('validation_reset', 'backend');
                }
            } else {
                $this->view->render('error', 'error', ['error' => 'Paramètre absent']);
            }
        } else {
            $this->view->render('resetAdmin', 'backend');
        }
    }
}

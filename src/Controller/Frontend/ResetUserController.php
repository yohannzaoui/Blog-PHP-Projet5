<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\ResetUserControllerInterface;
use Core\View;
use App\Repository\UserRepository;
use Core\Mailer;
use Core\Request;

/**
 *
 */
class ResetUserController implements ResetUserControllerInterface
{

    private $userRepository;
    private $view;
    private $mailer;

    /**
     * 
     */
    function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->view = new View;
        $this->mailer = new Mailer;
    }

    /**
     * 
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
                if (empty($_POST['email'])) {
                    $this->view->render('error', 'error', ['error' => 'Le champ adresse Email est vide']);
                } else {
                    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                    $token = $this->mailer->token($email);
                    $user = $this->userRepository->resetUser($token);
                    $this->mailer->send('Récuperation de votre mot de passe', $user['pseudo'], $email, "Pour réinitialiser votre mot de passe cliquez sur ce lien\n\n http://siteweb/passwordResetUser/".$user['id']."/$token");
                    $this->view->render('validation_reset', 'backend');
                }
            } else {
                $this->view->render('error', 'error', ['error' => 'Paramètre absent']);
            }
        } else {
            $this->view->render('resetUser', 'frontend');
        }
    }
}

<?php

namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\RegisterControllerInterface;
use App\Repository\UserRepository;
use Core\View;
use Core\Mailer;
use Core\Request;

/**
 *
 */
class RegisterController implements RegisterControllerInterface
{

    private $view;
    private $userRepository;
    private $mailer;

    /**
     * 
     */
    public function __construct()
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
            if($request->has('submit') && $request->getRequest('submit') === "send"){
                if(empty($request->getRequest('pseudo')) || !preg_match('/^[a-zA-Z0-9_]+$/', $request->getRequest('pseudo'))){
                    $this->view->render('error', 'error', ['error'=>'Votre pseudo doit contenir seulement des lettres (miniscules et/ou majuscules), des chiffres et le signe _ "underscore".']);
                } else {
                    $pseudo = $this->view->check($request->getRequest('pseudo'));
                }
                if (empty($request->getRequest('pass')) && empty($request->getRequest('pass1'))) {
                    $this->view->render('error', 'error', ['error'=>'Les champs mot de passe sont vide']);
                } elseif ($request->getRequest('pass') === $request->getRequest('pass1')) {
                    $hash = $this->view->check($request->getRequest('pass'));
                    $passhash = password_hash($hash, PASSWORD_BCRYPT);
                } else {
                    $this->view->render('error', 'error', ['error' => 'Les mots de passes ne sont pas identiques']);
                }
                if (empty($request->getRequest('email'))) {
                    $this->view->render('error', 'error', ['error' => 'Veuillez entrer votre adresse email']);
                } else {
                    $email = filter_var($request->getRequest('email'), FILTER_VALIDATE_EMAIL);
                    $token = $this->mailer->token($email);
                    $userId = $this->userRepository->addAdmin($pseudo, $passhash, $email, $token);
                    $this->mailer->send('Confirmez votre inscription', $pseudo, $email, "Veuillez confirmez votre compte en cliquant sur ce lien\n\n http://siteweb/confirme/$userId/$token");
                    $this->view->render('validation', 'frontend', ['email' => $email]);
                }
            } else {
                $this->view->render('error', 'error', ['error' => 'Le paramétre d\'envoi est absent']);
            }
        }
    }
}

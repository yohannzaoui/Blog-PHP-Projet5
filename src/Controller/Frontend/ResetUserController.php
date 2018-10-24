<?php

namespace App\Controller\Frontend;

use Core\View;
use Core\Mailer;
use Core\Request;
use Core\Response;
use App\Repository\UserRepository;
use App\Controller\Frontend\Interfaces\ResetUserControllerInterface;


/**
 * Class ResetUserController
 * @package App\Controller\Frontend
 */
class ResetUserController implements ResetUserControllerInterface
{


    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * @var View
     */
    private $view;


    /**
     * @var Mailer
     */
    private $mailer;


    /**
     * ResetUserController constructor.
     */
    function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->view = new View;
        $this->mailer = new Mailer;
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->has('submit') && $request->getRequest('submit') === 'send') {
                if (empty($request->getRequest('email'))) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Le champ adresse Email est vide']));
                } else {
                    $email = filter_var($request->getRequest('email'), FILTER_VALIDATE_EMAIL);
                    $token = $this->mailer->token($email);
                    try {
                        $user = $this->userRepository->resetUser($token);
                    } catch(\Exception $e) {
                        return new Response(200, [], $this->view->render('error', 'error', ['error'=>$e->getMessage()]));
                    }
                    $this->mailer->send('Récuperation de votre mot de passe', $user['pseudo'], $email, "Pour réinitialiser votre mot de passe cliquez sur ce lien\n\n http://siteweb/passwordResetUser/".$user['id']."/$token");
                    return new Response(200, [], $this->view->render('validation_reset', 'backend', ['email' => $email]));
                }
            } else {
                return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Paramètre absent']));
            }
        } else {
            return new Response(200, [], $this->view->render('resetUser', 'frontend'));
        }
    }
}

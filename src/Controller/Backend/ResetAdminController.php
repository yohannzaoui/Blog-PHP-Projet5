<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Request;
use Core\Mailer;
use Core\Response;
use App\Repository\userRepository;
use App\Controller\Backend\Interfaces\ResetAdminControllerInterface;

/**
 * Class ResetAdminController
 * @package App\Controller\Backend
 */
class ResetAdminController implements ResetAdminControllerInterface
{

    /**
     * @var View
     */
    private $view;


    /**
     * @var Mailer
     */
    private $mailer;


    /**
     * @var userRepository
     */
    private $userRepository;


    /**
     * ResetAdminController constructor.
     */
    public function __construct()
    {
        $this->view = new View;
        $this->mailer = new Mailer;
        $this->userRepository = new userRepository;
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
                        $user = $this->userRepository->resetAdmin($token);
                    } catch(\Exception $e) {
                        return new Response(200, [], $this->view->render('error', 'error', ['error' => $e->getMessage()]));
                    }
                    $this->mailer->send('Récuperation de votre mot de passe', $user['pseudo'], $email, "Pour réinitialiser votre mot de passe cliquez sur ce lien\n\n http://siteweb/passwordResetAdmin/".$user['id']."/$token");
                    return new Response(200, [], $this->view->render('validation_reset', 'backend', ['email' => $email]));
                }
            } else {
                return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Paramètre absent']));
            }
        } else {
            return new Response(200, [], $this->view->render('resetAdmin', 'backend'));
        }
    }
}

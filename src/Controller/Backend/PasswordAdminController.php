<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\UserRepository;
use App\Controller\Backend\Interfaces\PasswordAdminControllerInterface;

/**
 *
 */
class PasswordAdminController implements PasswordAdminControllerInterface
{

    /**
     * 
     */
    private $view;

    /**
     * 
     */
    private $userRepository;

    /**
     * 
     */
    public function __construct()
    {
        $this->view = new View;
        $this->userRepository = new userRepository;
    }

    /**
     * 
     */
    public function __invoke(request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->has('submit') && $request->getRequest('submit') === 'send' && !empty($request->getRequest('id')) && !empty($request->getRequest('token'))) {
                if (empty($request->getRequest('pass1')) && $request->getRequest('pass2')) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => "Veuillez reseigner votre nouveau mot de passe"]));
                } elseif ($request->getRequest('pass1') === $request->getRequest('pass2')) {
                    $id = $this->view->check($request->getRequest('id'));
                    $pass = $this->view->check($request->getRequest('pass1'));
                    $passhash = password_hash($pass, PASSWORD_BCRYPT);
                    try {
                        $this->userRepository->resetUserPass($id, $passhash);
                    } catch(\Exception $e) {
                        return new Response(200, [], $this->view->render('error', 'error', ['error'=>$e->getMessage()]));
                    }
                    return new Response(200, [], $this->view->render('confirmation_reset', 'backend'));
                } else {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Les mots de passe doivent être identique']));
                }
            } else {
                return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Paramètre absent']));
            }
        } else {
            return new Response(200, [], $this->view->render('passwordResetAdmin', 'backend'));
        }
    }
}

<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\PasswordUserControllerInterface;
use App\Repository\UserRepository;
use Core\View;
use Core\Request;


/**
 *
 */
class PasswordUserController implements PasswordUserControllerInterface
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
        $this->userRepository = new UserRepository;
    }

    /**
     * 
     */
    public function __invoke(request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->has('submit') && $request->getRequest('submit') === 'send' && !empty($request->getRequest('id')) && !empty($request->getRequest('token'))) {
                if (empty($request->getRequest('pass1')) && $request->getRequest('pass2')) {
                    $this->view->render('error', 'error', ['error' => 'Veuillez reseigner votre nouveau mot de passe']);
                } elseif ($request->getRequest('pass1') === $request->getRequest('pass2')) {
                    $id = $this->view->check($request->getRequest('id'));
                    $pass = $this->view->check($request->getRequest('pass1'));
                    $passhash = password_hash($pass, PASSWORD_BCRYPT);
                    $this->userRepository->resetUserPass($id, $passhash);
                    $this->view->render('confirmation_reset', 'backend');
                } else {
                    $this->view->render('error', 'error', ['error' => 'Les mots de passe doivent être identique']);
                }
            } else {
                $this->view->render('error', 'error', ['error' => 'Paramètre absent']);
            }
        } else {
            $this->view->render('passwordResetUser', 'frontend');
        }
    }
}

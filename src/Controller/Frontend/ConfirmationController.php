<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\ConfirmationControllerInterface;
use Core\View;
use App\Repository\userRepository;
use Core\Request;

/**
 *
 */
class ConfirmationController implements ConfirmationControllerInterface
{
    private $view;
    private $userRepository;

    /**
     * 
     */
    public function __construct()
    {
        $this->view = new View;;
        $this->userRepository = new userRepository;
    }

    /**
     * 
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('GET')) {
            if ($request->getQuery('token', 'id') && !empty($request->getQuery('token')) && !empty($request->getQuery('id'))) {
                $token = $this->view->check($request->getQuery('token'));
                $id = $this->view->check($request->getQuery('id'));
                $this->userRepository->confirme($id, $token);
                $this->view->render('confirmation', 'frontend');
            } else {
                $this->view->render('error', 'error', ['error' => 'Identifiant / Token incorrect']);
            }
        } else {
            $this->view->render('error', 'error', ['error' => 'System error']);
        }
    }

}

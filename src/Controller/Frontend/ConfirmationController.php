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
    public function __invoke(request $request)
    {
        if ($request->isMethod('GET')) {
            if (isset($_GET['token'], $_GET['id']) && !empty($_GET['token']) && !empty($_GET['id'])) {
                $token = $this->view->check($_GET['token']);
                $id = $this->view->check($_GET['id']);
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

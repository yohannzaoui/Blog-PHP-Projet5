<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\ConfimationControllerInterface;
use Core\View;
use App\Repository\userRepository;

/**
 *
 */
class ConfimationController implements ConfimationControllerInterface
{
    private $view;
    private $userRepository;

    public function __construct()
    {
        $this->view = $view;
        $this->userRepository = $userRepository;
    }

    public function __invoke(request $request)
    {
        if (isset($_GET['token'], $_GET['id']) && !empty($_GET['token']) && !empty($_GET['id'])) {
            $token = $this->view->check($_GET['token']);
            $id = $this->view->check($_GET['id']);
            $this->userRepository->confirme($id, $token);
            $this->view->render('confirmation', 'frontend');
        } else {
            $this->view->render('error', 'error', ['error'=>'Identifiant / Token incorrect']);
        }
    }
}

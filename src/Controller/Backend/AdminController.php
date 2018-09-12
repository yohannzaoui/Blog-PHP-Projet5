<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\AdminControllerInterface;
use App\Repository\UserRepository;
use Core\View;
use Core\Request;
use Core\Session;
use Exception;

/**
 *
 */
class AdminController implements AdminControllerInterface
{

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->view = new View;
        $this->session = new Session;
    }

    public function __invoke(request $request)
    {
        if ($request->isMethod('GET')) {
            $users = $this->userRepository->allAdmins();
            $line = $this->userRepository->countAdmins();
            $this->view->render('listAdmins', 'backend', ['users'=>$users, 'line'=>$line]);
        } else {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $idAdmin = $request->getParam('id');
                $id = $this->view->check($idAdmin);
                $this->userRepository->deleteUser($id);
                $this->session->flash('Administrateur supprimé');
                header('Location: ../listAdmins');
            } else {
                $this->view->render('error', 'error', ['error'=>'ID inconnu']);
            }
        }
    }
}

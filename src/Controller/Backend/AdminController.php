<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\AdminControllerInterface;
use App\Repository\UserRepository;
use Core\View;
use Core\Request;
use Core\Session;

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
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $idAdmin = $request->getParam('id');
                $id = $this->view->check($idAdmin);
                $this->userRepository->deleteUser($idAdmin);
                $this->session->flash('Administrateur supprimé');
                $users = $this->userRepository->allAdmins();
                $line = $this->userRepository->countAdmins();
                $this->view->render('listAdmins', 'backend', ['users'=>$users, 'line'=>$line]);
        } else {
            $users = $this->userRepository->allAdmins();
            $line = $this->userRepository->countAdmins();
            $this->view->render('listAdmins', 'backend', ['users'=>$users, 'line'=>$line]);
            }
        }
    }
 }

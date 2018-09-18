<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\AdminControllerInterface;
use App\Repository\UserRepository;
use Core\View;
use Core\Request;

/**
 *
 */
class AdminController implements AdminControllerInterface
{

    private $view;
    private $userRepository;

    /**
     * 
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->view = new View;
    }

    /**
     * 
     */
    public function __invoke(request $request)
    {
        if ($request->isMethod('GET')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $idAdmin = $request->getParam('id');
                $id = $this->view->check($idAdmin);
                $this->userRepository->deleteUser($idAdmin);
                $request->getSession()->flash('Administrateur supprimé');
                header('location:../listAdmins');
        } else {
            $users = $this->userRepository->allAdmins();
            $line = $this->userRepository->countAdmins();
            $this->view->render('listAdmins', 'backend', ['users' => $users, 'line' => $line]);
            }
        }
    }
 }

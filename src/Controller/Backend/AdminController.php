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
    public function __invoke(Request $request)
    {
        if ($request->isMethod('GET')) {
            if (!empty($request->getQuery('id'))) {
                $id = $this->view->check($request->getQuery('id'));
                $this->userRepository->deleteUser($id);
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

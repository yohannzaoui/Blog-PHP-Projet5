<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\UserControllerInterface;
use App\Repository\UserRepository;
use Core\View;
use Core\Request;

/**
 *
 */
class UserController implements UserControllerInterface
{

    /**
     * 
     */
    private $userRepository;

    /**
     * 
     */
    private $view;

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
            if ($request->getQuery('id') && !empty($request->getQuery('id'))) {
                $id = $this->view->check($request->getQuery('id'));
                $this->userRepository->deleteUser($id);
                $request->getSession()->flash('Membre supprimé');
                header('location:..\listUsers');
        } else {
            $users = $this->userRepository->allUsers();
            $line = $this->userRepository->countMembers();
            $this->view->render('listUsers', 'backend', ['users' => $users, 'line' => $line]);
            }
        } else {
            $this->view->render('error', 'error', ['error' => 'System error']);
        }
    }
 }

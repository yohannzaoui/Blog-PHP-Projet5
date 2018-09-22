<?php
namespace App\Controller\Backend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\UserRepository;
use App\Controller\Backend\Interfaces\UserControllerInterface;

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
            return new Response(200, [], $this->view->render('listUsers', 'backend', ['users' => $users, 'line' => $line]));
            //$this->view->render('listUsers', 'backend', ['users' => $users, 'line' => $line]);
            }
        } else {
            return new Response(200, [], $this->view->render('error', 'error', ['error' => 'System error']));
            //$this->view->render('error', 'error', ['error' => 'System error']);
        }
    }
 }

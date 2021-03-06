<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\UserRepository;
use App\Controller\Backend\Interfaces\UserControllerInterface;


/**
 * Class UserController
 * @package App\Controller\Backend
 */
class UserController implements UserControllerInterface
{


    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * @var View
     */
    private $view;


    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->view = new View;
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('GET')) {
            if ($request->getQuery('id') && !empty($request->getQuery('id'))) {
                $id = $this->view->check($request->getQuery('id'));
                try {
                    $this->userRepository->deleteUser($id);
                } catch(\Exception $e) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => $e->getMessage()]));
                }
                $request->getSession()->flash('Membre supprimé');
                header('location:..\listUsers');
        } else {
            $users = $this->userRepository->allUsers();
            $line = $this->userRepository->countMembers();
            return new Response(200, [], $this->view->render('listUsers', 'backend', ['users' => $users, 'line' => $line]));
            }
        } else {
            return new Response(200, [], $this->view->render('error', 'error', ['error' => 'System error']));
        }
    }
 }

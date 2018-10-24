<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\UserRepository;
use App\Controller\Backend\Interfaces\AdminControllerInterface;


/**
 * Class AdminController
 * @package App\Controller\Backend
 */
class AdminController implements AdminControllerInterface
{


    /**
     * @var View
     */
    private $view;


    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * AdminController constructor.
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
            if (!empty($request->getQuery('id'))) {
                $id = $this->view->check($request->getQuery('id'));
                try {
                    $this->userRepository->deleteUser($id);
                } catch(\Exception $e) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => $e->getMessage()]));
                }
                $request->getSession()->flash('Administrateur supprimé');
                header('location:../listAdmins');
        } else {
            $users = $this->userRepository->allAdmins();
            $line = $this->userRepository->countAdmins();
            return new Response(200, [], $this->view->render('listAdmins', 'backend', ['users' => $users, 'line' => $line]));
            }
        } else {
            return new Response(200, [], $this->view->render('error', 'error', ['error' => 'System error']));
        }
    }
 }

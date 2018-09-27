<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\UserRepository;
use App\Controller\Backend\Interfaces\LoginControllerInterface;

/**
 *
 */
class LoginController implements LoginControllerInterface
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
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->has('submit') && $request->getRequest('submit') === "send") {
                if (empty($request->getRequest('pseudo')) || empty($request->getRequest('pass'))) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Tous les champs doivent être complétés']));
                } else {
                    $pseudo = $this->view->check($request->getRequest('pseudo'));
                    $pass = $this->view->check($request->getRequest('pass'));
                    try {
                        $user = $this->userRepository->adminConnect($pseudo, $pass);
                    } catch(\Exception $e) {
                        return new Response(200, [], $this->view->render('error', 'error', ['error' => $e->getMessage()]));
                    }
                    $request->getSession()->add('roleAdmin', $user['role']);
                    $request->getSession()->add('pseudoAdmin', $user['pseudo']);
                }
                return new Response(200, [], $this->view->render('addPost', 'backend'));
            } else {
                return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Le paramètre envoyé est incorrect']));
            }
        } else {
            if (!isset($_SESSION['pseudoAdmin'], $_SESSION['roleAdmin'])) {
                return new Response(200, [], $this->view->render('loginAdmin', 'backend'));
            } else {
                header('location:../addPost');
                }
            }
        }
    }

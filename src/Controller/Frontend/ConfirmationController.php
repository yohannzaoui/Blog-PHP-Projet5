<?php

namespace App\Controller\Frontend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\userRepository;
use App\Controller\Frontend\Interfaces\ConfirmationControllerInterface;

/**
 *
 */
class ConfirmationController implements ConfirmationControllerInterface
{
    /**
     * 
     */
    private $view;

    /**
     * 
     */
    private $userRepository;

    /**
     * 
     */
    public function __construct()
    {
        $this->view = new View;;
        $this->userRepository = new userRepository;
    }

    /**
     * 
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('GET')) {
            if ($request->getQuery('token', 'id') && !empty($request->getQuery('token')) && !empty($request->getQuery('id'))) {
                $token = $this->view->check($request->getQuery('token'));
                $id = $this->view->check($request->getQuery('id'));
                try {
                    $this->userRepository->confirme($id, $token);
                } catch (\Exception $e) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => $e->getMessage()]));
                }
                return new Response(200, [], $this->view->render('confirmation', 'frontend'));
            } else {
                return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Identifiant / Token incorrect']));
            }
        } else {
            return new Response(200, [], $this->view->render('error', 'error', ['error' => 'System error']));
        }
    }

}

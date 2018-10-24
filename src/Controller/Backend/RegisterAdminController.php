<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Response;
use App\Controller\Backend\Interfaces\RegisterAdminControllerInterface;

/**
 * Class RegisterAdminController
 * @package App\Controller\Backend
 */
class RegisterAdminController implements RegisterAdminControllerInterface
{


    /**
     * @var View
     */
    private $view;


    /**
     * RegisterAdminController constructor.
     */
    public function __construct()
    {
        $this->view = new View;
    }


    /**
     * @return Response
     */
    public function __invoke()
    {
        return new Response(200, [], $this->view->render('registerAdmin', 'backend'));
    }
}

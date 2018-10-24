<?php

namespace App\Controller\Frontend;

use Core\View;
use Core\Response;
use App\Controller\Frontend\Interfaces\Error404ControllerInterface;

/**
 * Class Error404Controller
 * @package App\Controller\Frontend
 */
class Error404Controller implements Error404ControllerInterface
{

    /**
     * @var View
     */
    private $view;

    /**
     * Error404Controller constructor.
     */
    public function __construct()
    {
        $this->view = new View;
    }

    /**
     * @return Response
     */
    public function error()
    {     
        return new Response(200, [], $this->view->render('error404', 'error'));
    }
}
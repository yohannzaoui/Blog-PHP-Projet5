<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\RegisterAdminControllerInterface;
use Core\View;

class RegisterAdminController implements RegisterAdminControllerInterface
{
    private $view;

    /**
     * 
     */
    public function __construct()
    {
        $this->view = new View;
    }

    /**
     * 
     */
    public function __invoke()
    {
        $this->view->render('registerAdmin', 'backend');
    }
}

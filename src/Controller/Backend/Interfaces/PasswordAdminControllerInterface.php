<?php
namespace App\Controller\Backend\Interfaces;

use Core\Request;

/**
 *
 */
interface PasswordAdminControllerInterface
{
    public function __construct();

    public function __invoke(request $request);
}

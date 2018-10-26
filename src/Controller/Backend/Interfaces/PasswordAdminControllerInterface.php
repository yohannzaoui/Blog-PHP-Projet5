<?php

namespace App\Controller\Backend\Interfaces;

use Core\Request;


/**
 * Interface PasswordAdminControllerInterface
 * @package App\Controller\Backend\Interfaces
 */
interface PasswordAdminControllerInterface
{
    /**
     * PasswordAdminControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

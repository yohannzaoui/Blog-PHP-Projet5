<?php

namespace App\Controller\Backend\Interfaces;

use Core\Request;


/**
 * Interface ResetAdminControllerInterface
 * @package App\Controller\Backend\Interfaces
 */
interface ResetAdminControllerInterface
{
    /**
     * ResetAdminControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

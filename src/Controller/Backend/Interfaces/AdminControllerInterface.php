<?php

namespace App\Controller\Backend\Interfaces;

use Core\Request;

/**
 * Interface AdminControllerInterface
 * @package App\Controller\Backend\Interfaces
 */
interface AdminControllerInterface
{
    /**
     * AdminControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

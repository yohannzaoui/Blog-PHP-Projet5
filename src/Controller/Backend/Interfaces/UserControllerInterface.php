<?php

namespace App\Controller\Backend\Interfaces;

use Core\Request;

/**
 * Interface UserControllerInterface
 * @package App\Controller\Backend\Interfaces
 */
interface UserControllerInterface
{
    /**
     * UserControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

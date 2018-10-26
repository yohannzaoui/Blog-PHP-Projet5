<?php

namespace App\Controller\Frontend\Interfaces;

use Core\Request;


/**
 * Interface LoginControllerInterface
 * @package App\Controller\Frontend\Interfaces
 */
interface LoginControllerInterface
{
    /**
     * LoginControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

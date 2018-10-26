<?php

namespace App\Controller\Frontend\Interfaces;

use Core\request;


/**
 * Interface PasswordUserControllerInterface
 * @package App\Controller\Frontend\Interfaces
 */
interface PasswordUserControllerInterface
{
    /**
     * PasswordUserControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

<?php

namespace App\Controller\Frontend\Interfaces;

use Core\Request;


/**
 * Interface ResetUserControllerInterface
 * @package App\Controller\Frontend\Interfaces
 */
interface ResetUserControllerInterface
{
    /**
     * ResetUserControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

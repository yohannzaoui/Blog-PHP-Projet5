<?php

namespace App\Controller\Frontend\Interfaces;

use Core\Request;


/**
 * Interface RegisterControllerInterface
 * @package App\Controller\Frontend\Interfaces
 */
interface RegisterControllerInterface
{
    /**
     * RegisterControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

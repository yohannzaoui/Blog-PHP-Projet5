<?php

namespace App\Controller\Frontend\Interfaces;

use Core\Request;


/**
 * Interface PostControllerInterface
 * @package App\Controller\Frontend\Interfaces
 */
interface PostControllerInterface
{
    /**
     * PostControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

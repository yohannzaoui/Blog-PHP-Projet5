<?php

namespace App\Controller\Backend\Interfaces;

use Core\Request;


/**
 * Interface EditPostControllerInterface
 * @package App\Controller\Backend\Interfaces
 */
interface EditPostControllerInterface
{
    /**
     * EditPostControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

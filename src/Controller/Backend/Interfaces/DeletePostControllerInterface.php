<?php

namespace App\Controller\Backend\Interfaces;

use Core\Request;


/**
 * Interface DeletePostControllerInterface
 * @package App\Controller\Backend\Interfaces
 */
interface DeletePostControllerInterface
{
    /**
     * DeletePostControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

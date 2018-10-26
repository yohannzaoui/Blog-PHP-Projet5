<?php

namespace App\controller\backend\Interfaces;

use Core\Request;


/**
 * Interface AddPostControllerInterface
 * @package App\controller\backend\Interfaces
 */
interface AddPostControllerInterface
{
    /**
     * AddPostControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

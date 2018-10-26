<?php

namespace App\Controller\Frontend\Interfaces;

use Core\Request;


/**
 * Interface AllPostsControllerInterface
 * @package App\Controller\Frontend\Interfaces
 */
interface AllPostsControllerInterface
{
    /**
     * AllPostsControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

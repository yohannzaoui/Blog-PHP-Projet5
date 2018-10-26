<?php

namespace App\Controller\Backend\Interfaces;

use Core\Request;


/**
 * Interface ListPostsControllerInterface
 * @package App\Controller\Backend\Interfaces
 */
interface ListPostsControllerInterface
{
    /**
     * ListPostsControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

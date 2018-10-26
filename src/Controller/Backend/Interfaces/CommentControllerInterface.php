<?php

namespace App\controller\backend\Interfaces;

use Core\Request;

/**
 * Interface CommentControllerInterface
 * @package App\controller\backend\Interfaces
 */
interface CommentControllerInterface
{
    /**
     * CommentControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}

<?php
namespace App\Controller\Backend\Interfaces;

use Core\Request;

/**
 *
 */
interface ListPostsControllerInterface
{
    public function __construct();

    public function __invoke(request $request);
}

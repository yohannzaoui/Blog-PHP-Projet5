<?php
namespace App\controller\backend\Interfaces;

use Core\Request;
use Core\Response;

/**
 *
 */
interface AddPostControllerInterface
{
    public function __construct();

    public function __invoke(Request $request, Response $response);
}

<?php
namespace App\controller\backend\Interfaces;

use Core\Request;

/**
 *
 */
interface AddPostControllerInterface
{
    public function __construct();

    public function __invoke(Request $request);
}

<?php
namespace App\controller\backend\Interfaces;

use Core\Request;
/**
 *
 */
interface CommentControllerInterface
{
    public function __construct();

    public function __invoke(Request $request);
}

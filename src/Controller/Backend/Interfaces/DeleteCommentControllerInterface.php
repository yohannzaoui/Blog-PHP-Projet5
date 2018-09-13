<?php
namespace App\Controller\Backend\Interfaces;

use Core\Request;

/**
 *
 */
interface DeleteCommentControllerInterface
{
    public function __construct();

    public function __invoke(Request $request);
}

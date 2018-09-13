<?php
namespace App\Controller\Backend\Interfaces;

use Core\Request;

/**
 *
 */
interface ValidateCommentControllerInterface
{
    public function __construct();

    public function __invoke(request $request);
}

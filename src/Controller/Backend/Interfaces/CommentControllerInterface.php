<?php
namespace App\controller\backend\Interfaces;

use Core\Request;
/**
 *
 */
interface CommentControllerInterface
{
    public function __construct();

    public function __invoke(request $request);

    //public function listComments();

    //public function validateComment($id);

    //public function deleteComment($id);

    //public function deleteComments($idPost);
}

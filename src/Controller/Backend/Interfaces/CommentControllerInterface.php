<?php

namespace App\controller\backend\Interfaces;

/**
 *
 */
interface CommentControllerInterface
{
    public function __construct();

    public function listComments();

    public function validateComment($id);

    public function deleteComment($id);

    public function deleteComments($idPost);
}

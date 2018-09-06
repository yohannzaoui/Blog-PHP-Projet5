<?php
namespace App\Repository\Interfaces;

/**
 *
 */
interface CommentRepositoryInterface
{
    public function getCommentsFromPost($idPost);

    public function addComment($idPost, $pseudo, $content);

    public function getCommentsNoValide();

    public function validateComment($id);

    public function deleteComment($id);

    public function deleteComments($idPost);

    public function countComments();
}

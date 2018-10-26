<?php
namespace App\Repository\Interfaces;

/**
 *
 */
interface CommentRepositoryInterface
{
    /**
     * @param $idPost
     * @return mixed
     */
    public function getCommentsFromPost($idPost);

    /**
     * @param $idPost
     * @param $pseudo
     * @param $content
     * @return mixed
     */
    public function addComment($idPost, $pseudo, $content);

    /**
     * @return mixed
     */
    public function getCommentsNoValide();

    /**
     * @param $id
     * @return mixed
     */
    public function validateComment($id);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteComment($id);

    /**
     * @param $idPost
     * @return mixed
     */
    public function deleteComments($idPost);

    /**
     * @return mixed
     */
    public function countComments();
}

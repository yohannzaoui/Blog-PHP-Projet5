<?php

namespace App\Repository\Interfaces;


/**
 * Interface PostRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface PostRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getRecentPosts();

    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $id
     * @return mixed
     */
    public function getPost($id);

    /**
     * @param $author
     * @param $title
     * @param $subtitle
     * @param $content
     * @return mixed
     */
    public function addPost($author, $title, $subtitle, $content);

    /**
     * @param $id
     * @param $author
     * @param $title
     * @param $subtitle
     * @param $content
     * @return mixed
     */
    public function updatePost($id, $author, $title, $subtitle, $content);

    /**
     * @param $id
     * @return mixed
     */
    public function deletePost($id);

    /**
     * @return mixed
     */
    public function countPosts();
}

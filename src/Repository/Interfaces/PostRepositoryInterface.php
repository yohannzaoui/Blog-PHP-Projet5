<?php
namespace App\Repository\Interfaces;

/**
 *
 */
interface PostRepositoryInterface
{
    public function getRecentPosts();

    public function getAll();

    public function getPost($id);

    public function addPost($author, $title, $subtitle, $content);

    public function updatePost($id, $author, $title, $subtitle, $content);

    public function deletePost($id);

    public function countPosts();
}

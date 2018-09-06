<?php
namespace App\Controller\Backend\Interfaces;

/**
 *
 */
interface PostControllerInterface
{
    public function __construct();

    public function savePost();

    public function listPosts();

    public function editPost($id);

    public function updatePost();

    public function deletePost($id);
}

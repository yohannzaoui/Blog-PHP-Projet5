<?php

require 'vendor/autoload.php';

class ControllerBackend
{
    private $postManager;
    private $commentManager;

    public function __construct()
    {
        $this->postManager = new BlogModels\PostManager;
        $this->commentManager = new BlogModels\CommentManager;
    }

    public function addPost()
    {
        $this->postManager->newPost();
    }

    public function deletePost()
    {
        $this->postManager->removePost();
    }

    public function updatePost()
    {
        
    }

    public function validateComment()
    {

    }

    public function deleteComment()
    {

    }


}

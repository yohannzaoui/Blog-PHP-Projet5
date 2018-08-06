<?php

//namespace BlogControllers;

require_once 'Models/PostManager.php';
require_once 'Models/CommentManager.php';
require_once 'System/View.php';

class ControllerFrontend
{

    private $postManager;
    private $commentManager;

    const VALIDE_COMMENT = "Votre commentaire sera affiché après validation.";

    public function __construct()
    {
        $this->postManager = new BlogModels\PostManager;
        $this->commentManager = new BlogModels\CommentManager;
    }

    public function getHome()
    {
        $posts = $this->postManager->getRecentPosts();
        $view = new BlogSystem\View("Home");
        $view->generer(array('posts' => $posts));
    }

    public function list()
    {
        $posts = $this->postManager->getListPosts();
        $view = new BlogSystem\View("List");
        $view->generer(array('posts' => $posts));
    }

    public function getPost(array $params)
    {
        $post = $this->postManager->post($_GET['id']);
        $comments = $this->commentManager->valideComment($_GET['id']);
        $view = new BlogSystem\View("Post");
        $view->generer(array('post' => $post, 'comments' => $comments));
    }


    public function comment()
    {
        $this->commentManager->addComment();
        //$this->post($_GET['id']);
        header('Location:/index.php/post?id='.$_GET['id']);
    }

    public static function valideComment()
    {
        return self::VALIDE_COMMENT;
    }
}

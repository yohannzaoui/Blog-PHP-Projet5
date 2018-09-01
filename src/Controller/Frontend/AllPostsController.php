<?php

namespace App\controller\frontend;

use App\repository\PostRepository;
use Core\View;

class AllPostsController
{
    private $postRepository;
    private $view;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->view = new View;
    }

    public function all()
    {
        $posts = $this->postRepository->getAll();
        $this->view->render('all','frontend', ['posts'=> $posts]);
    }
}

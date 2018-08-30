<?php

namespace App\controller\frontend;

use Core\View;
use App\repository\PostRepository;

class HomeController
{
    private $postRepository;
    private $view;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->view = new View;
    }

    public function home()
    {
        $posts = $this->postRepository->getRecentPosts();
        $this->view->render('home', ['posts'=> $posts]);
    }
}

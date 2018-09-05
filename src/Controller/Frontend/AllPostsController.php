<?php

namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\AllPostsControllerInterface;
use App\repository\PostRepository;
use Core\View;

/**
 *
 */
class AllPostsController implements AllPostsControllerInterface
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

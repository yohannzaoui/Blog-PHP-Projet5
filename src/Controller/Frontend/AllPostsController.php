<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\AllPostsControllerInterface;
use App\Repository\PostRepository;
use Core\View;
use Core\Request;

/**
 *
 */
class AllPostsController implements AllPostsControllerInterface
{

    /**
     * 
     */
    private $postRepository;

    /**
     * 
     */
    private $view;

    /**
     * 
     */
    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->view = new View;
    }

    /**
     * 
     */
    public function __invoke(request $request)
    {
        if ($request->isMethod('GET')) {
            $posts = $this->postRepository->getAll();
            $this->view->render('all', 'frontend', ['posts' => $posts]);
        }
    }
}

<?php
namespace App\Controller\Frontend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\PostRepository;
use App\Controller\Frontend\Interfaces\AllPostsControllerInterface;

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
            return new Response(200, [],  $this->view->render('all', 'frontend', ['posts' => $posts]));
        } else {
            throw new \Exception("Error system");
        }
    }
}

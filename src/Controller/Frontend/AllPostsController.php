<?php

namespace App\Controller\Frontend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\PostRepository;
use App\Controller\Frontend\Interfaces\AllPostsControllerInterface;


/**
 * Class AllPostsController
 * @package App\Controller\Frontend
 */
class AllPostsController implements AllPostsControllerInterface
{


    /**
     * @var PostRepository
     */
    private $postRepository;


    /**
     * @var View
     */
    private $view;


    /**
     * AllPostsController constructor.
     */
    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->view = new View;
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('GET')) {
            $posts = $this->postRepository->getAll();
            return new Response(200, [],  $this->view->render('all', 'frontend', ['posts' => $posts]));
        } else {
            return new Response(200, [], $this->view->render('error', 'error', ['error' => 'System error']));
        }
    }
}

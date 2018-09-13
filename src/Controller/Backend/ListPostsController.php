<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\ListPostsControllerInterface;
use App\Repository\PostRepository;
use Core\View;
use Core\Request;

/**
 *
 */
class ListPostsController implements ListPostsControllerInterface
{

    private $view;
    private $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->view = new View;
    }

    public function __invoke(Request $request)
    {
        if ($request->isMethod('GET')) {
            $posts = $this->postRepository->getAll();
            $line = $this->postRepository->countPosts();
            $this->view->render('listPosts', 'backend', ['posts'=>$posts, 'line'=>$line]);
        } else {
            $this->view->render('error', 'error', ['error'=>'Erreur system']);
        }
    }
}

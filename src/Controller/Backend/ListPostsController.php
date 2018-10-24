<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;
use App\Controller\Backend\Interfaces\ListPostsControllerInterface;


/**
 * Class ListPostsController
 * @package App\Controller\Backend
 */
class ListPostsController implements ListPostsControllerInterface
{


    /**
     * @var View
     */
    private $view;


    /**
     * @var PostRepository
     */
    private $postRepository;


    /**
     * @var CommentRepository
     */
    private $commentRepository;


    /**
     * ListPostsController constructor.
     */
    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->commentRepository = new CommentRepository;
        $this->view = new View;
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('GET')) {
            if (!empty($request->getQuery('id'))) {
                $idComments = $this->view->check($request->getQuery('id'));
                try {
                    $this->commentRepository->deleteComments($idComments);
                } catch(\Exception $e) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => $e->getMessage()]));
                }
                $request->getSession()->flash("Tous les commentaires de l'article on été supprimer");
                header('Location: ../listPosts');
            } else {
                $posts = $this->postRepository->getAll();
                $line = $this->postRepository->countPosts();
                return new Response(200, [], $this->view->render('listPosts', 'backend', ['posts' => $posts, 'line' => $line]));
            }
        } else {
            return new Response(200, [], $this->view->render('error', 'error', ['error' => 'System error']));
        }
    }

}

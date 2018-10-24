<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\PostRepository;
use App\Controller\Backend\Interfaces\DeletePostControllerInterface;


/**
 * Class DeletePostController
 * @package App\Controller\Backend
 */
class DeletePostController implements DeletePostControllerInterface
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
     * DeletePostController constructor.
     */
    public function __construct()
    {
        $this->view = new View;
        $this->postRepository = new PostRepository;
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('GET')) {
            if (!empty($request->getQuery('id'))) {
                $idPost = $this->view->check($request->getQuery('id'));
                try {
                    $this->postRepository->deletePost($idPost);
                } catch(\Exception $e) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => $e->getMessage()]));
                }
                $request->getSession()->flash('Article supprimé');
                header('location:..\listPosts');
            } else {
                return new Response(200, [], $this->view->render('error', 'error', ['error' => "Identifiant d'article manquant"]));
            }
        } else {
            return new Response(200, [], $this->view->render('error', 'error', ['error' => "system error"]));
        }

    }
}

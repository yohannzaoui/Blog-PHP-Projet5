<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\PostRepository;
use App\Controller\Backend\Interfaces\EditPostControllerInterface;


/**
 * Class EditPostController
 * @package App\Controller\Backend
 */
class EditPostController implements EditPostControllerInterface
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
     * EditPostController constructor.
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
            if ($request->getQuery('id')) {
                $idPost = $this->view->check($request->getQuery('id'));
                try {
                    $post = $this->postRepository->getPost($idPost);
                } catch(\Exception $e) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => $e->getMessage()]));
                }
                return new Response(200, [], $this->view->render('editPost', 'backend', ['post' => $post]));
                } else {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Article inconnu']));
                }
            } else {
                if ($request->has('submit') && $request->getRequest('submit') === 'send' && !empty($request->getRequest('author')) && !empty($request->getRequest('title')) && !empty($request->getRequest('subtitle')) && !empty($request->getRequest('content')) && !empty($request->getRequest('id'))) {
                    $author = $this->view->check($request->getRequest('author'));
                    $title = $this->view->check($request->getRequest('title'));
                    $subtitle = $this->view->check($request->getRequest('subtitle'));
                    $content = $this->view->check($request->getRequest('content'));
                    $id = $this->view->check($request->getRequest('id'));
                    $this->postRepository->updatePost($id, $author, $title, $subtitle, $content);
                    $request->getSession()->flash('Article modifié.');
                    header('Location: ../listPosts');
                    } else {
                        return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Tous les champs doivent être completés']));
                    }
            }

    }
}

<?php

namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\AddPostControllerInterface;
use Core\View;
use Core\Request;
use App\Repository\PostRepository;
use Core\Response;


/**
 * Class AddPostController
 * @package App\Controller\Backend
 */
class AddPostController implements AddPostControllerInterface
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
     * AddPostController constructor.
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
            return new Response(200, [], $this->view->render('addPost', 'backend'));
        } else {
            if ($request->has('submit') && $request->getRequest('submit') === 'send') {
                if (!empty($request->getRequest('author')) && !empty($request->getRequest('title')) && !empty($request->getRequest('subtitle')) && !empty($request->getRequest('content'))) {
                    $author = $this->view->check($request->getRequest('author'));
                    $title = $this->view->check($request->getRequest('title'));
                    $subtitle = $this->view->check($request->getRequest('subtitle'));
                    $content = $this->view->check($request->getRequest('content'));
                    $this->postRepository->addPost($author, $title, $subtitle, $content);
                    $request->getSession()->flash('Article ajouté.');
                    return new Response(200, [], $this->view->render('addPost', 'backend'));
                } else {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Les champs sont vides']));
                }
            } else {
                return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Paramètre inconnu']));
            } 
        }
    }

}

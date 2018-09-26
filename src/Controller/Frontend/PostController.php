<?php

namespace App\Controller\Frontend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;
use App\Controller\Frontend\Interfaces\PostControllerInterface;

/**
 *
 */
class PostController implements PostControllerInterface
{

    /**
     * 
     */
    private $postRepository;

    /**
     * 
     */
    private $commentRepository;

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
        $this->commentRepository = new CommentRepository;
        $this->view = new View;
    }

    /**
     * 
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->has('submit') && $request->getRequest('submit') === 'send') {
                if (empty($request->getRequest('pseudo')) && empty($request->getRequest('content')) && empty($request->getRequest('idPost'))) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Tous les champs doivent être remplis']));
                } else {
                    $pseudo = $this->view->check($request->getRequest('pseudo'));
                    $content = $this->view->check($request->getRequest('content'));
                    $idPost = $this->view->check($request->getRequest('idPost'));
                    $this->commentRepository->addComment($idPost, $pseudo, $content);
                    $request->getSession()->flash('Votre commentaire à été envoyé. Il sera affiché après validation.');
                    header('Location: ../post/'.$idPost);
                }
            } else {
                return new Response(200, [], $this->view->render('error', 'error', ['error' => 'Paramètre incorrect']));
            }
        } else {
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $id = $request->getQuery('id');
                    $idPost = $this->view->check($id);
                    try {
                        $post = $this->postRepository->getPost($idPost);
                    } catch(\Exception $e) {
                        return new Response(200, [], $this->view->render('error', 'error', ['error' => $e->getMessage()]));
                    }
                    $comments = $this->commentRepository->getCommentsFromPost($idPost);
                    return new Response(200, [], $this->view->render('post', 'frontend', ['post' => $post, 'comments' => $comments]));
                } else {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => 'L\'ID de l\'article est absent']));
                }
        }

    }
}

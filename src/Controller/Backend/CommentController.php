<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\CommentRepository;
use App\Controller\Backend\Interfaces\CommentControllerInterface;

/**
 *
 */
class CommentController implements CommentControllerInterface
{

    /**
     * 
     */
    private $view;

    /**
     * 
     */
    private $commentRepository;

    /**
     * 
     */
    public function __construct()
    {
        $this->commentRepository = new CommentRepository;
        $this->view = new View;
    }


    /**
     * 
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('GET')) {
            if (!empty($request->getQuery('id'))) {
                $idComment = $this->view->check($request->getQuery('id'));
                try {
                    $this->commentRepository->deleteComment($idComment);
                } catch(\Exception $e) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => $e->getMessage()]));
                }
                $request->getSession()->flash('Commentaire supprimé');
                header('Location: ../listComments');
            } else {
                $comments = $this->commentRepository->getCommentsNoValide();
                $line = $this->commentRepository->countComments();
                return new Response(200, [], $this->view->render('listComments', 'backend', ['comments' => $comments, 'line' => $line]));
            }
        } else {
            return new Response(200, [], $this->view->render('error', 'error', ['error' => 'System error']));
        }
    }
    
}

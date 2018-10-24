<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\CommentRepository;
use App\Controller\Backend\Interfaces\CommentControllerInterface;


/**
 * Class CommentController
 * @package App\Controller\Backend
 */
class CommentController implements CommentControllerInterface
{


    /**
     * @var View
     */
    private $view;


    /**
     * @var CommentRepository
     */
    private $commentRepository;


    /**
     * CommentController constructor.
     */
    public function __construct()
    {
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

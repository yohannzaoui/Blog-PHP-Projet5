<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Repository\CommentRepository;
use App\Controller\Backend\Interfaces\ValidateCommentControllerInterface;


/**
 * Class ValidateCommentController
 * @package App\Controller\Backend
 */
class ValidateCommentController implements ValidateCommentControllerInterface
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
     * ValidateCommentController constructor.
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
            if ($request->getQuery('id') && !empty($request->getQuery('id'))) {
                $idComment = $this->view->check($request->getQuery('id'));
                try {
                    $this->commentRepository->validateComment($idComment);
                } catch(\Exception $e) {
                    return new Response(200, [], $this->view->render('error', 'error', ['error' => $e->getMessage()]));
                }
                $request->getSession()->flash('Commentaire validé');
                header('Location: ../listComments');
            } else {
                return new Response(200, [], $this->view->render('error', 'error', ['error' => 'ID du commentaire à valider manquant']));
            }
        } else {
            return new Response(200, [], $this->view->render('error', 'error', ['error' => 'System error']));
        }
        
    }

}

<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\ValidateCommentControllerInterface;
use App\Repository\CommentRepository;
use Core\View;
use Core\session;
use Core\Request;

/**
 *
 */
class ValidateCommentController implements ValidateCommentControllerInterface
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
    public function __invoke(request $request)
    {
        if ($request->isMethod('GET')) {
            if ($request->getQuery('id') && !empty($request->getQuery('id'))) {
                $idComment = $this->view->check($request->getQuery('id'));
                $this->commentRepository->validateComment($idComment);
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

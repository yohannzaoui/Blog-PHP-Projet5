<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\CommentControllerInterface;
use App\Repository\CommentRepository;
use Core\View;
use Core\Request;

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
                $this->commentRepository->deleteComment($idComment);
                $request->getSession()->flash('Commentaire supprimé');
                header('Location: ../listComments');
            } else {
                $comments = $this->commentRepository->getCommentsNoValide();
                $line = $this->commentRepository->countComments();
                $this->view->render('listComments', 'backend', ['comments' => $comments, 'line' => $line]);
            }
        } else {
            $this->view->render('error', 'error', ['error' => 'System error']);
        }
    }
    
}

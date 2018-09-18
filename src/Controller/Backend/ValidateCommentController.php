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

    private $view;
    private $commentRepository;
    private $session;

    /**
     * 
     */
    public function __construct()
    {
        $this->commentRepository = new CommentRepository;
        $this->view = new View;
        $this->session = new Session;
    }

    /**
     * 
     */
    public function __invoke(request $request)
    {
        if ($request->isMethod('GET')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $request->getParam('id');
                $idComment = $this->view->check($id);
                $this->commentRepository->validateComment($idComment);
                $this->session->flash('Commentaire validé');
                header('Location: ../listComments');
            } else {
                $this->view->render('error', 'error', ['error' => 'ID du commentaire à valider manquant']);
            }
        } else {
            $this->view->render('error', 'error', ['error' => 'System error']);
        }
        
    }

}

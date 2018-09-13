<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\DeleteCommentControllerInterface;
use App\Repository\CommentRepository;
use Core\View;
use Core\Session;
use Core\Request;

/**
 *
 */
class DeleteCommentController implements DeleteCommentControllerInterface
{

    private $view;
    private $commentRepository;
    private $session;

    public function __construct()
    {
        $this->commentRepository = new CommentRepository;
        $this->view = new View;
        $this->session = new Session;
    }

    public function __invoke(Request $request)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $request->getParam('id');
            $idComment = $this->view->check($id);
            $this->commentRepository->deleteComment($idComment);
            $this->session->flash('Commentaire supprimé');
            header('Location: ../listComments');
        } else {
            $this->view->render('error', 'error', ['error' => 'ID du commentaire à supprimer manquant']);
        }

    }
}

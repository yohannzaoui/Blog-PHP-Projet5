<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\CommentControllerInterface;
use App\Repository\CommentRepository;
use Core\View;
use Core\Session;
use Exception;

/**
 *
 */
class CommentController implements CommentControllerInterface
{

    private $view;
    private $commentRepository;

    public function __construct()
    {
        $this->commentRepository = new CommentRepository;
        $this->view = new View;
        $this->session = new Session;
    }

    public function listComments()
    {
        $comments = $this->commentRepository->getCommentsNoValide();
        $line = $this->commentRepository->countComments();
        $this->view->render('listComments', 'backend', ['comments'=>$comments,'line'=>$line]);
    }

    public function validateComment($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $this->view->check($_GET['id']);
            $this->commentRepository->validateComment($id);
            $this->session->flash('Commentaire validé');
            header('Location: ../index.php?route=listComments');
        }
            throw new Exception('ID du commentaire à valider manquant');
    }

    public function deleteComment($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $this->view->check($_GET['id']);
            $this->commentRepository->deleteComment($id);
            $this->session->flash('Commentaire supprimé');
            header('Location: ../index.php?route=listComments');
        }
                throw new Exception('ID du commentaire à supprimer manquant');
     }

     public function deleteComments($idPost)
     {
         if (isset($_GET['idPost']) && !empty($_GET['idPost'])) {
             $id = $this->view->check($_GET['idPost']);
             $this->commentRepository->deleteComments($idPost);
             $this->session->flash("Tous les commentaires de l'article on été supprimer");
             header('Location: ../index.php?route=listPosts');
         }
                 throw new Exception('ID de l\'article manquant');
      }
}

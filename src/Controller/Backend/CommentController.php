<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\CommentControllerInterface;
use App\Repository\CommentRepository;
use Core\View;
use Core\Session;
use Core\Request;

/**
 *
 */
class CommentController implements CommentControllerInterface
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

    public function __invoke(request $request)
    {
        if ($request->isMethod('GET')) {
            $comments = $this->commentRepository->getCommentsNoValide();
            $line = $this->commentRepository->countComments();
            $this->view->render('listComments', 'backend', ['comments'=>$comments, 'line'=>$line]);
        } else {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $request->getParam('id');
                $idComment = $this->view->check($id);
                $this->commentRepository->validateComment($idComment);
                $this->session->flash('Commentaire validé');
                header('Location: ../listComments');
            } else {
                $this->view->render('error', 'error', ['error'=>'ID du commentaire à valider manquant']);
            }
        }
    }

    /*public function __invoke(request $request)
    {
        if ($request->isMethod('GET')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $request->getParam('id');
                $idComment = $this->view->check($id);
                $this->commentRepository->validateComment($idComment);
                $this->session->flash('Commentaire validé');
                header('Location: ../listComments');
            } else {
                throw new Exception('ID du commentaire à valider manquant');
            }
        } else {
            $comments = $this->commentRepository->getCommentsNoValide();
            $line = $this->commentRepository->countComments();
            $this->view->render('listComments', 'backend', ['comments'=>$comments, 'line'=>$line]);
        }
    }*/


    /*public function validateComment($id)
    {
        if (isset($_GET['idv']) && !empty($_GET['idv'])) {
            $idv = $this->view->check($_GET['idv']);
            $this->commentRepository->validateComment($idv);
            $this->session->flash('Commentaire validé');
            header('Location: ../index.php?route=listComments');
        } else {
            throw new Exception('ID du commentaire à valider manquant');
        }
    }*/

    /*public function deleteComment($id)
    {
        if (isset($_GET['idd']) && !empty($_GET['idd'])) {
            $idd = $this->view->check($_GET['idd']);
            $this->commentRepository->deleteComment($idd);
            $this->session->flash('Commentaire supprimé');
            header('Location: ../index.php?route=listComments');
        } else {
            throw new Exception('ID du commentaire à supprimer manquant');
        }

    }*/

     /*public function deleteComments($idPost)
     {
         if (isset($_GET['idPost']) && !empty($_GET['idPost'])) {
             $id = $this->view->check($_GET['idPost']);
             $this->commentRepository->deleteComments($idPost);
             $this->session->flash("Tous les commentaires de l'article on été supprimer");
             header('Location: ../index.php?route=listPosts');
         }
                 throw new Exception('ID de l\'article manquant');
      }*/
}

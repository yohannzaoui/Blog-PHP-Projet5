<?php

namespace App\controller\backend;

use App\Repository\CommentRepository;
use Core\View;
use Exception;

class CommentController
{
    private $view;
    private $commentRepository;

    public function __construct()
    {
        $this->commentRepository = new CommentRepository;
        $this->view = new View;
    }

    public function listComments()
    {
        $comments = $this->commentRepository->getCommentsNoValide();
        $line = $this->commentRepository->countComments();
        $this->view->render('listComments','backend', ['comments'=>$comments,'line'=>$line]);
    }

    public function validateComment($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $this->view->check($_GET['id']);
            $this->commentRepository->validateComment($id);
            header('Location: ../index.php?route=listComments');
        } else {
            throw new Exception('ID du commentaire à valider manquant');
        }
    }

    public function deleteComment($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $this->view->check($_GET['id']);
            $this->commentRepository->deleteComment($id);
            header('Location: ../index.php?route=listComments');
        }   else {
                throw new Exception('ID du commentaire à supprimer manquant');
            }
     }
}

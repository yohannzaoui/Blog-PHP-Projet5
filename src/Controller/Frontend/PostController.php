<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\PostControllerInterface;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;
use Core\View;
use Core\Session;
use Core\Request;

/**
 *
 */
class PostController implements PostControllerInterface
{

    private $postRepository;
    private $commentRepository;
    private $view;
    private $session;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->commentRepository = new CommentRepository;
        $this->view = new View;
        $this->session = new Session;
    }

    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
                if (empty($_POST['pseudo']) && empty($_POST['content']) && empty($_POST['idPost'])) {
                    $this->view->render('error', 'error', ['error'=>'Tous les champs doivent être remplis']);
                } else {
                    $pseudo = $this->view->check($_POST['pseudo']);
                    $content = $this->view->check($_POST['content']);
                    $idPost = $this->view->check($_POST['idPost']);
                    $this->commentRepository->addComment($idPost, $pseudo, $content);
                    $this->session->flash('Votre commentaire à été envoyé. Il sera affiché après validation.');
                    header('Location: ../post/'.$idPost);
                }
            } else {
                $this->view->render('error', 'error', ['error'=>'Paramètre incorrect']);
            }
        } else {
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $id = $request->getParam('id');
                    $idPost = $this->view->check($id);
                    $post = $this->postRepository->getPost($idPost);
                    $comments = $this->commentRepository->getCommentsFromPost($idPost);
                    $this->view->render('post', 'frontend', ['post'=> $post, 'comments'=>$comments]);
                } else {
                    $this->view->render('error', 'error', ['error'=>'L\'ID de l\'article est absent']);
                }
        }

    }
}

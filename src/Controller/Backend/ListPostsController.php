<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\ListPostsControllerInterface;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;
use Core\Session;
use Core\View;
use Core\Request;

/**
 *
 */
class ListPostsController implements ListPostsControllerInterface
{

    private $view;
    private $postRepository;
    private $commentRepository;
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
        if ($request->isMethod('GET')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $idComments = $request->getParam('id');
                $id = $this->view->check($idComments);
                $this->commentRepository->deleteComments($idComments);
                $this->session->flash("Tous les commentaires de l'article on été supprimer");
                header('Location: ../listPosts');
            } else {
                $posts = $this->postRepository->getAll();
                $line = $this->postRepository->countPosts();
                $this->view->render('listPosts', 'backend', ['posts' => $posts, 'line' => $line]);
            }
        } else {
            $this->view->render('error', 'error', ['error' => 'System error']);
        }
    }

}

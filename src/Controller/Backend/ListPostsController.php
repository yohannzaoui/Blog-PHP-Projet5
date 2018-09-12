<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\ListPostsControllerInterface;
use App\Repository\PostRepository;
use Core\Session;
use Core\View;
use Core\Request;

/**
 *
 */
class ListPostsController implements ListPostsControllerInterface
{

    private $view;
    private $session;
    private $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->view = new View;
        $this->session = new Session;
    }

    public function __invoke(request $request)
    {
        if ($request->isMethod('GET')) {
            $posts = $this->postRepository->getAll();
            $line = $this->postRepository->countPosts();
            $this->view->render('listPosts', 'backend', ['posts'=>$posts, 'line'=>$line]);
        } else {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $request->getParam('id');
                $idPost = $this->view->check($id);
                $this->postRepository->deletePost($idPost);
                $this->session->flash("L'article à été supprimer");
                header('Location: ../listPosts');
            }   else {
                $this->view->render('error', 'error', ['error'=>"Identifiant d'article manquant"]);
            }
        }
    }
}

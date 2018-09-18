<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\EditPostControllerInterface;
use App\Repository\PostRepository;
use Core\View;
use Core\Request;

/**
 *
 */
class EditPostController implements EditPostControllerInterface
{

    private $view;
    private $postRepository;

    /**
     * 
     */
    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->view = new View;
    }

    /**
     * 
     */
    public function __invoke(request $request)
    {
        if ($request->isMethod('GET')) {
            if (isset($_GET['id'])) {
                $id = $request->getParam('id');
                $idPost = $this->view->check($id);
                $post = $this->postRepository->getPost($idPost);
                $this->view->render('editPost', 'backend', ['post' => $post]);
                } else {
                    $this->view->render('error', 'error', ['error' => 'Article inconnu']);
                }
            } else {
                if (isset($_POST['submit']) && $_POST['submit'] === 'send' && !empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['subtitle']) && !empty(['content']) && !empty($_POST['id'])) {
                    $author = $this->view->check($_POST['author']);
                    $title = $this->view->check($_POST['title']);
                    $subtitle = $this->view->check($_POST['subtitle']);
                    $content = $this->view->check($_POST['content']);
                    $id = $this->view->check($_POST['id']);
                    $this->postRepository->updatePost($id, $author, $title, $subtitle, $content);
                    $request->getSession()->flash('Article modifié. <a href="/post/'.$id.'">Voir l\'article</a>');
                    header('Location: ../listPosts');
                    } else {
                        $this->view->render('error', 'error', ['error' => 'Tous les champs doivent être completés']);
                    }
            }

    }
}

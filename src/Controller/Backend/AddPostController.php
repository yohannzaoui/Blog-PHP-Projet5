<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\AddPostControllerInterface;
use Core\View;
use Core\Request;
use Core\Session;
use App\Repository\PostRepository;

class AddPostController implements AddPostControllerInterface
{

    private $view;
    private $session;
    private $postRepository;

    public function __construct()
    {
        $this->view = new View;
        $this->session = new Session;
        $this->postRepository = new PostRepository;
    }

    public function __invoke(Request $request)
    {
        if ($request->isMethod('GET')) {
            $this->view->render('addPost', 'backend');
        } else {
            if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
                if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_POST['content'])) {
                    $author = $this->view->check($_POST['author']);
                    $title = $this->view->check($_POST['title']);
                    $subtitle = $this->view->check($_POST['subtitle']);
                    $content = $this->view->check($_POST['content']);
                    $id = $this->postRepository->addPost($author, $title, $subtitle, $content);
                    $this->session->flash('Article ajouté. <a href="/post/'.$id.'">Voir l\'article</a>');
                    $this->view->render('addPost', 'backend');
                } else {
                    $this->view->render('error', 'error', ['error' => 'Les champs sont vides']);
                }
            } else {
                $this->view->render('error', 'error', ['error' => 'Paramètre inconnu']);
            } 
        }
    }

}

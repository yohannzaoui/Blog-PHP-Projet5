<?php

namespace App\controller\backend;

use App\Controller\Backend\Interfaces\PostControllerInterface;
use App\repository\PostRepository;
use Core\View;
use Core\Session;
use Exception;

/**
 *
 */
class PostController implements PostControllerInterface
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

    public function savePost()
    {
        if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
            if(!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_POST['content'])){
                $author = $this->view->check($_POST['author']);
                $title = $this->view->check($_POST['title']);
                $subtitle = $this->view->check($_POST['subtitle']);
                $content = $this->view->check($_POST['content']);
                $id = $this->postRepository->addPost($author, $title, $subtitle, $content);
                $this->session->flash('Article ajouté. <a href="index.php?route=post&id='.$id.'">Voir l\'article</a>');
            } else {
                $this->session->flash('Tous les champs doivent être remplis');
            }
        }
        $this->view->render('addPost','backend');
    }

    public function listPosts()
    {
        $posts = $this->postRepository->getAll();
        $line = $this->postRepository->countPosts();
        $this->view->render('listPosts','backend', ['posts'=>$posts,'line'=>$line]);
    }

    public function editPost($id)
    {
        $post = $this->postRepository->getPost($id);
        $this->view->render('editPost','backend', ['post'=>$post]);
    }

    public function updatePost()
    {
        if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
            if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['subtitle']) && !empty(['content']) && !empty($_POST['id'])) {
                $author = $this->view->check($_POST['author']);
                $title = $this->view->check($_POST['title']);
                $subtitle = $this->view->check($_POST['subtitle']);
                $content = $this->view->check($_POST['content']);
                $id = $this->view->check($_POST['id']);
                $this->postRepository->updatePost($id, $author, $title, $subtitle, $content);
                header('Location: ../index.php?route=post&id='.$id);
            }   else {
                throw new Exception('Tous les champs doivent être remplis');
            }
        }
    }

    public function deletePost($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $this->view->check($_GET['id']);
            $this->postRepository->deletePost($id);
            $this->session->flash("L'article à été supprimer");
            header('Location: ../index.php?route=listPosts');
        }   else {
            throw new Exception('Identifiant d\'article manquant');
        }
    }
}

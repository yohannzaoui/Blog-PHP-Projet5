<?php

namespace App\controller;

use App\repository\PostRepository;
use App\Repository\CommentRepository;
use App\Repository\UserRepository;
use App\Entity\Post;
use Core\View;
use Core\Session;
use Exception;

class BackController
{
    private $postRepository;
    private $commentRepository;
    private $userRepository;
    private $view;
    private $session;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->commentRepository = new CommentRepository;
        $this->userRepository = new UserRepository;
        $this->view = new View;
        $this->session = new Session;
    }

    public function admin()
    {
        if(!isset($_SESSION['pseudoAdmin'], $_SESSION['role'])) {
            $this->view->render('admin');
        } else {
            $this->view->render('addPost');
        }
    }

    public function registration()
    {
        $this->view->render('registration');
    }

    public function savePost()
    {
        if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
            if(!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_POST['content'])){
                $author = $_POST['author'];
                $title = $_POST['title'];
                $subtitle = $_POST['subtitle'];
                $content = $_POST['content'];
                $this->postRepository->addPost($author, $title, $subtitle, $content);
                header('Location: ../index.php?route=all');
            } else {
                throw new Exception('Tous les champs doivent être remplis');
            }
        }
        $this->view->render('addPost');
    }

    public function listComments()
    {
        $comments = $this->commentRepository->getCommentsNoValide();
        $line = $this->commentRepository->countComments();
        $this->view->render('listComments', ['comments'=>$comments,'line'=>$line]);
    }

    public function validateComment($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $this->commentRepository->validateComment($id);
            header('Location: ../index.php?route=listComments');
        } else {
            throw new Exception('ID du commentaire à valider manquant');
        }
    }

    public function deleteComment($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $this->commentRepository->deleteComment($id);
            header('Location: ../index.php?route=listComments');
        }   else {
                throw new Exception('ID du commentaire à supprimer manquant');
            }
     }

    public function listPosts()
    {
        $posts = $this->postRepository->getAll();
        $line = $this->postRepository->countPosts();
        $this->view->render('listPosts', ['posts'=>$posts,'line'=>$line]);
    }

    public function editPost($id)
    {
        $post = $this->postRepository->getPost($id);
        $this->view->render('editPost', ['post'=>$post]);
    }

    public function updatePost()
    {
        if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
            if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['subtitle']) && !empty(['content']) && !empty($_POST['id'])) {
                $author = $_POST['author'];
                $title = $_POST['title'];
                $subtitle = $_POST['subtitle'];
                $content = $_POST['content'];
                $id = $_POST['id'];
                $this->postRepository->updatePost($id, $author, $title, $subtitle, $content);
                header('Location: ../index.php?route=post&id='.$id);
            }   else {
                throw new Exception('Tous les champs doivent être remplis');
            }
        }
    }

    public function deleteAll($id)
{
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $this->postRepository->deleteAll($id);
            header('Location: ../index.php?route=listPosts');
        }   else {
            throw new Exception('Identifiant manquant');
        }
     }

    public function deletePost($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $this->postRepository->deletePost($id);
            header('Location: ../index.php?route=listPosts');
        }   else {
            throw new Exception('Identifiant d\'article manquant');
        }
    }

     public function addAdmin()
     {
         if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
             if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass1'])) {
                 if ($_POST['pass'] === $_POST['pass1']) {
                     $pseudo = $_POST['pseudo'];
                     $passhash = password_hash($_POST['pass'], PASSWORD_BCRYPT);
                     $this->userRepository->addAdmin($pseudo, $passhash);
                     header('Location: ../index.php?route=admin');
                 } else {
                     throw new Exception('Les mots de passes ne correspondent pas');
                 }
             } else {
                 throw new Exception('Tous les champs doivent être remplis');
             }
         } else {
             throw new Exception('Le paramètre envoyé est incorrect');
         }
     }

     public function listAdmins()
     {
         $users = $this->userRepository->allAdmins();
         $line = $this->userRepository->countAdmins();
         $this->view->render('listAdmins', ['users'=>$users, 'line'=>$line]);
     }

     public function listUsers()
     {
         $users = $this->userRepository->allUsers();
         $line = $this->userRepository->countMembers();
         $this->view->render('listUsers', ['users'=>$users, 'line'=>$line]);
     }

     public function deleteAdmin()
     {
         if (isset($_GET['id']) && !empty($_GET['id'])) {
             $id = htmlspecialchars($_GET['id']);
             $this->userRepository->deleteUser($id);
             header('Location: ../index.php?route=listAdmins');
         } else {
             throw new Exception('Identifiant d\'administrateur manquant');
         }
     }

     public function deleteUser()
     {
         if (isset($_GET['id']) && !empty($_GET['id'])) {
             $id = htmlspecialchars($_GET['id']);
             $this->userRepository->deleteUser($id);
             header('Location: ../index.php?route=listUsers');
         } else {
             throw new Exception('Identifiant du membre manquant');
         }
     }

     public function adminConnect()
     {
         if (isset($_POST['submit']) && $_POST['submit'] === "send"){
             if(!empty($_POST['pseudo']) && !empty($_POST['pass'])){
                 $pseudo = $_POST['pseudo'];
                 $pass = $_POST['pass'];
                 $user = $this->userRepository->adminConnexion($pseudo, $pass);
                 $_SESSION['pseudoAdmin'] = $user['pseudo'];
                 $_SESSION['role'] = $user['role'];
             } else {
                 throw new Exception('Tous les champs doivent être remplis');
             }
         } else {
             throw new Exception('Le paramètre envoyé est incorrect');
         }
     }

     public function deconnexionAdmin()
     {
         $this->session->sessionDestroy();
         header('Location: ../index.php?route=admin');
     }
 }

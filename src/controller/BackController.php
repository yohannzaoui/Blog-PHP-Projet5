<?php

namespace App\controller;

use App\repository\PostRepository;
use App\Repository\CommentRepository;
use App\Repository\UserRepository;
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
        if(!isset($_SESSION['pseudoAdmin'], $_SESSION['roleAdmin'])) {
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
                $author = $this->view->check($_POST['author']);
                $title = $this->view->check($_POST['title']);
                $subtitle = $this->view->check($_POST['subtitle']);
                $content = $this->view->check($_POST['content']);
                $this->postRepository->addPost($author, $title, $subtitle, $content);
                $this->session->setFlash('Article ajouté.');
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

    public function deleteAll($id)
{
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $this->view->check($_GET['id']);
            $this->postRepository->deleteAll($id);
            header('Location: ../index.php?route=listPosts');
        }   else {
            throw new Exception('Identifiant manquant');
        }
     }

    public function deletePost($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $this->view->check($_GET['id']);
            $this->postRepository->deletePost($id);
            header('Location: ../index.php?route=listPosts');
        }   else {
            throw new Exception('Identifiant d\'article manquant');
        }
    }

     public function addAdmin()
     {
         if (isset($_POST['submit']) && $_POST['submit'] === 'send') {
             if (!empty($_POST['pseudo']) && preg_match('/^[a-zA-Z09_]+$/', $_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass1']) && !empty($_POST['email'])) {
                 if ($_POST['pass'] === $_POST['pass1']) {
                     $pseudo = $this->view->check($_POST['pseudo']);
                     $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                     $hash = $this->view->check($_POST['pass']);
                     $passhash = password_hash($hash, PASSWORD_BCRYPT);
                     $this->userRepository->addAdmin($pseudo, $passhash, $email);
                     header('Location: ../index.php?route=admin');
                 } else {
                     throw new Exception('Les mots de passes ne correspondent pas');
                 }
             } else {
                 throw new Exception('Tous les champs doivent être remplis / Votre pseudo doit contenir seulement des lettres (miniscules et/ou majuscules), des chiffres et le signe _ "underscore".');
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
             $id = $this->view->check($_GET['id']);
             $this->userRepository->deleteUser($id);
             header('Location: ../index.php?route=listAdmins');
         } else {
             throw new Exception('Identifiant d\'administrateur manquant');
         }
     }

     public function deleteUser()
     {
         if (isset($_GET['id']) && !empty($_GET['id'])) {
             $id = $this->view->check($_GET['id']);
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
                 $pseudo = $this->view->check($_POST['pseudo']);
                 $pass = $this->view->check($_POST['pass']);
                 $user = $this->userRepository->adminConnexion($pseudo, $pass);
                 $this->session->setSession('roleAdmin', $user['role']);
                 $this->session->setSession('pseudoAdmin', $user['pseudo']);
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

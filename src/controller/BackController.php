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
        $this->view->render('admin');
    }

    public function registration()
    {
        $this->view->render('registration');
    }

    public function savePost($post)
    {
        if (isset($post['submit']) && $post['submit'] === 'send') {
            if(!empty($post['author']) && !empty($post['title']) && !empty($post['subtitle']) && !empty($post['content'])){
                $postRepo = $this->postRepository->addPost($post);
                header('Location: ../index.php?route=all');
            } else {
                throw new Exception('Tous les champs doivent être remplis');
            }
        }
        $this->view->render('addPost', ['post'=>$post]);
    }

     /*public function savePost($post)
     {
        if(isset($_POST['submit']) && $_POST['submit'] === 'send') {
            if(!empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_POST['author']) && !empty($_POST['content'])) {
                $post = new Post(['title'=>$_POST['title'],
                                'subtitle'=>$_POST['subtitle'],
                                'author'=>$_POST['author'],
                                'content'=>$_POST['content']
                                ]);
                $postRepo = $this->postRepository->addPost($post);
                header('Location: ../index.php?route=all');
            }
        }
        $this->view->render('addPost');
     }*/

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
            $commentRepo = $this->commentRepository->validateComment($id);
            header('Location: ../index.php?route=listComments');
        } else {
            throw new Exception('ID du commentaire à valider manquant');
        }
    }

    public function deleteComment($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $commentRepo = $this->commentRepository->deleteComment($id);
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

    public function updatePost($post)
    {
        if (isset($post['submit']) && $post['submit'] === 'send') {
            if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['subtitle']) && !empty(['content'])) {
                $postRepo = $this->postRepository->updatePost($post);
                header('Location: ../index.php?route=post&id='.$_POST['id']);
            }   else {
                throw new Exception('Tous les champs doivent être remplis');
            }
        }
    }

    public function deleteAll($id)
{
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $postRepo = $this->postRepository->deleteAll($id);
            header('Location: ../index.php?route=listPosts');
        }   else {
            throw new Exception('Identifiant manquant');
        }
     }

    public function deletePost($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $postRepo = $this->postRepository->deletePost($id);
            header('Location: ../index.php?route=listPosts');
        }   else {
            throw new Exception('Identifiant d\'article manquant');
        }
    }

     public function addAdmin($user)
     {
         if (isset($user['submit']) && $user['submit'] === 'send') {
             if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass1'])) {
                 if ($_POST['pass'] === $_POST['pass1']) {
                     $passhash = password_hash($_POST['pass'], PASSWORD_BCRYPT);
                     $userRepo = $this->userRepository->addAdmin($user, $passhash);
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
             $userRepo = $this->userRepository->deleteUser($id);
             header('Location: ../index.php?route=listAdmins');
         } else {
             throw new Exception('Identifiant d\'administrateur manquant');
         }
     }

     public function deleteUser()
     {
         if (isset($_GET['id']) && !empty($_GET['id'])) {
             $id = htmlspecialchars($_GET['id']);
             $userRepo = $this->userRepository->deleteUser($id);
             header('Location: ../index.php?route=listUsers');
         } else {
             throw new Exception('Identifiant du membre manquant');
         }
     }

     public function adminConnexion($user)
     {
         if (isset($_POST['submit']) && !empty($_POST['pseudo']) && !empty($_POST['pass'])) {
             $passhash = password_verify($_POST['pass'], PASSWORD_BCRYPT);
             $userRepo = $this->userRepository->adminConnexion($user, $passhash);
             header('Location: ../index.php?route=savePost');
         } else {
             throw new Exception('Tous les champs doivent être remplis');
         }
     }

     public function deconnexion()
     {
         $this->session->sessionDestroy();
         header('Location: ../index.php?route=admin');
     }
 }

<?php

 namespace App\controller;
 
 use App\repository\PostRepository;
 use App\Repository\CommentRepository;
 use App\Repository\UserRepository;
 use Core\View;
 use Core\Session;
 
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
        if(isset($post['submit'])) {
            $postRepo = $this->postRepository->addPost($post);
            header('Location: ../public/index.php?route=all');
        }
        $this->view->render('addPost', ['post'=>$post]);
     }

     public function noValideComment()
     {
        $comments = $this->commentRepository->getCommentsNoValide();
        $this->view->render('noValideComment', ['comments'=>$comments]);
     }

     public function validateComment($id)
     { 
         if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $commentRepo = $this->commentRepository->validateComment($id);
            header('Location: ../index.php?route=noValideComment');
         }
     }

     public function deleteComment($id){
         if(isset($_GET['id'])){
             $id = htmlspecialchars($_GET['id']);
             $commentRepo = $this->commentRepository->deleteComment($id);
             header('Location: ../index.php?route=noValideComment');
         }
     }

     public function listPosts()
     {
        $posts = $this->postRepository->getAll();
        $this->view->render('listPosts', ['posts'=>$posts]);
     }

     public function editPost($id)
     {
        $post = $this->postRepository->getPost($id);
        $this->view->render('editPost', ['post'=>$post]);
     }

     public function updatePost($post)
     {
         if(isset($post['submit'])){
             if(!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['subtitle']) && !empty(['content'])){
                $postRepo = $this->postRepository->updatePost($post);
            header('Location: ../index.php?route=post&id='.$_POST['id']);
             }
         }
     }

     public function deleteAll($id)
     {
         if(isset($_GET['id'])){
             $id = htmlspecialchars($_GET['id']);
             $postRepo = $this->postRepository->deleteAll($id);
             header('Location: ../index.php?route=listPosts');
         }
     }

     public function deletePost($id)
     {
        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $postRepo = $this->postRepository->deletePost($id);
            header('Location: ../index.php?route=listPosts');
        }
     }

     public function addUser($user)
     {
        if(isset($user['submit'])){
            if(!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass1'])){
                if($_POST['pass'] == $_POST['pass1']){
                    $userRepo = $this->userRepository->addUser($user);
                }
            }
        }
        header('Location: ../index.php?route=admin');
     }

     public function listUsers()
     {
         $users = $this->userRepository->allUsers();
         $this->view->render('listUsers', ['users'=>$users]);
     }

     public function deleteUser()
     {
        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $userRepo = $this->userRepository->delete($id);
            header('Location: ../index.php?route=listUsers');
        }
     }

     public function connexion()
     {
         
     }

     public function deconnexion()
     {
        $this->session->destroy();
        header('Location: ../index.php?route=admin');
     }
 }
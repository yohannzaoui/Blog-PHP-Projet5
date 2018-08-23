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
        if(isset($post['submit']) && $post['submit'] === 'send') {
            $postRepo = $this->postRepository->addPost($post);
            header('Location: ../index.php?route=all');
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
         if(isset($_GET['id']) && !empty($_GET['id'])){
             $id = htmlspecialchars($_GET['id']);
             $commentRepo = $this->commentRepository->deleteComment($id);
             header('Location: ../index.php?route=noValideComment');
         }else {
            $this->view->render('error',['error'=>'Identifiant manquant']);
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
         if(isset($post['submit']) && $post['submit'] === 'send'){
             if(!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['subtitle']) && !empty(['content'])){
                $postRepo = $this->postRepository->updatePost($post);
                header('Location: ../index.php?route=post&id='.$_POST['id']);
             }else {
                $this->view->render('error',['error'=>'Tous les champs doivent être remplis ']);
            }
         }
     }

     public function deleteAll($id)
     {
         if(isset($_GET['id']) && !empty($_GET['id'])){
             $id = htmlspecialchars($_GET['id']);
             $postRepo = $this->postRepository->deleteAll($id);
             header('Location: ../index.php?route=listPosts');
         }else {
            $this->view->render('error',['error'=>'Identifiant manquant']);
        }
     }

     public function deletePost($id)
     {
        if(isset($_GET['id']) && !empty($_GET['id']) ){
            $id = htmlspecialchars($_GET['id']);
            $postRepo = $this->postRepository->deletePost($id);
            header('Location: ../index.php?route=listPosts');
        }else {
            $this->view->render('error',['error'=>'Identifiant d\'article manquant']);
        }
     }

     public function addAdmin($user)
     {
        if(isset($user['submit'])){
            if(!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass1'])){
                if($_POST['pass'] == $_POST['pass1']){
                    $passhash = password_hash($_POST['pass'],PASSWORD_BCRYPT);
                    $userRepo = $this->userRepository->addAdmin($user,$passhash);
                    header('Location: ../index.php?route=admin');
                }else {
                    $this->view->render('error',['error'=>'Les mots de passes ne correspondent pas']);
                }
            }else {
                $this->view->render('error',['error'=>'Les champs sont vides']);
            }
        }
     }

     public function listAdmins()
     {
         $users = $this->userRepository->allAdmins();
         $this->view->render('listAdmins', ['users'=>$users]);
     }

     public function listUsers()
     {
         $users = $this->userRepository->allUsers();
         $this->view->render('listUsers', ['users'=>$users]);
     }

     public function deleteAdmin()
     {
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $userRepo = $this->userRepository->deleteAdmin($id);
            header('Location: ../index.php?route=listAdmins');
        }else {
            $this->view->render('error',['error'=>'Identifiant d\'administrateur manquant']);
        }
     }

     public function deleteUser()
     {
         if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $userRepo = $this->userRepository->deleteUser($id);
            header('Location: ../index.php?route=listUsers');
         }else {
            $this->view->render('error',['error'=>'Identifiant de membre manquant']);
        }
     } 

     public function adminConnexion($user)
     {
         if(isset($_POST['submit']) && !empty($_POST['pseudo']) && !empty($_POST['pass'])){
            $passhash = password_verify($_POST['pass'],PASSWORD_BCRYPT);
            $userRepo = $this->userRepository->adminConnexion($user,$passhash);
            header('Location: ../index.php?route=savePost');
         }
     }

     public function deconnexion()
     {
        $this->session->destroy();
        header('Location: ../index.php?route=admin');
     }
 }
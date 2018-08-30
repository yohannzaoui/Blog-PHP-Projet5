<?php

namespace App\controller\backend;

use App\Repository\UserRepository;
use Core\View;
use Exception;

class UserController
{
    private $userRepository;
    private $view;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->view = new View;
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
 }

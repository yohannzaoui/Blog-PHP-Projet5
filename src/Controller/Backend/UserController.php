<?php

namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\UserControllerInterface;
use App\Repository\UserRepository;
use Core\View;
use Core\Session;
use Exception;

/**
 *
 */
class UserController implements UserControllerInterface
{

    private $userRepository;
    private $view;
    private $session;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->view = new View;
        $this->session = new Session;
    }

     public function listAdmins()
     {
         $users = $this->userRepository->allAdmins();
         $line = $this->userRepository->countAdmins();
         $this->view->render('listAdmins','backend', ['users'=>$users, 'line'=>$line]);
     }

     public function listUsers()
     {
         $users = $this->userRepository->allUsers();
         $line = $this->userRepository->countMembers();
         $this->view->render('listUsers','backend', ['users'=>$users, 'line'=>$line]);
     }

     public function deleteAdmin()
     {
         if (isset($_GET['id']) && !empty($_GET['id'])) {
             $id = $this->view->check($_GET['id']);
             $this->userRepository->deleteUser($id);
             $this->session->flash('Administrateur supprimé');
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
             $this->session->flash('Membre supprimé');
             header('Location: ../index.php?route=listUsers');
         } else {
             throw new Exception('Identifiant du membre manquant');
         }
     }
 }

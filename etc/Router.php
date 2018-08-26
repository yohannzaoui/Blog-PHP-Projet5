<?php

namespace Core;

use App\controller\FrontController;
use App\controller\BackController;
use Core\View;

class Router
{
    private $frontController;
    private $backController;
    private $view;

    public function __construct()
    {
        $this->frontController = new FrontController;
        $this->backController = new BackController;
        $this->view = new View;
    }

    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'post'){
                    $this->frontController->post($_GET['id']);
                }
                elseif($_GET['route'] === 'all'){
                    $this->frontController->all();
                }
                elseif($_GET['route'] === 'saveComment'){
                    $this->frontController->saveComment($_POST);
                }
                elseif($_GET['route'] === 'connexionPage'){
                    $this->frontController->connexionPage();
                }
                elseif($_GET['route'] === 'registrationPage'){
                    $this->frontController->registrationPage();
                }
                elseif($_GET['route'] === 'addUser'){
                    $this->frontController->addUser($_POST);
                }
                elseif($_GET['route'] === 'userConnexion'){
                    $this->frontController->userConnexion($_POST);
                }
                elseif($_GET['route'] === 'admin'){
                    $this->backController->admin();
                }
                elseif($_GET['route'] === 'registration'){
                    $this->backController->registration();
                }
                elseif($_GET['route'] === 'savePost'){
                    $this->backController->savePost($_POST);
                }
                elseif($_GET['route'] === 'listComments'){
                    $this->backController->listComments();
                }
                elseif($_GET['route'] === 'validateComment'){
                    $this->backController->validateComment($_GET['id']);
                }
                elseif($_GET['route'] === 'deleteComment'){
                    $this->backController->deleteComment($_GET['id']);
                }
                elseif($_GET['route'] === 'listPosts'){
                    $this->backController->listPosts();
                }
                elseif($_GET['route'] === 'editPost'){
                    $this->backController->editPost($_GET['id']);
                }
                elseif($_GET['route'] === 'updatePost'){
                    $this->backController->updatePost($_POST);
                }
                elseif($_GET['route'] === 'deleteAll'){
                    $this->backController->deleteAll($_GET['id']);
                }
                elseif($_GET['route'] === 'deletePost'){
                    $this->backController->deletePost($_GET['id']);
                }
                elseif($_GET['route'] === 'addAdmin'){
                    $this->backController->addAdmin($_POST);
                }
                elseif($_GET['route'] === 'listAdmins'){
                    $this->backController->listAdmins();
                }
                elseif($_GET['route'] === 'listUsers'){
                    $this->backController->listUsers();
                }
                elseif($_GET['route'] === 'deleteAdmin'){
                    $this->backController->deleteAdmin($_GET['id']);
                }
                elseif($_GET['route'] === 'deleteUser'){
                    $this->backController->deleteUser($_GET['id']);
                }
                elseif($_GET['route'] === 'adminConnexion'){
                    $this->backController->adminConnexion($_POST);
                }
                elseif($_GET['route'] === 'deconnexion'){
                    $this->backController->deconnexion();
                }
                else{
                    $this->view->render('error',['error'=>'Page introuvable']);
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (\Exception $e)
        {
            $this->view->render('error',['error'=>$e->getMessage()]);
        }
    }
}

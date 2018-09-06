<?php
namespace Core;

use Core\Interfaces\RouterInterface;
use App\Controller\Frontend\HomeController;
use App\Controller\Frontend\AllPostsController;
use App\Controller\Frontend\PostController;
use App\Controller\Frontend\LoginController;
use App\Controller\Frontend\RegisterController;
use App\Controller\Frontend\LogoutController;
use App\Controller\Backend\LoginController as LoginAdmin;
use App\Controller\Backend\LogoutController as LogoutAdmin;
use App\Controller\Backend\RegisterController as RegisterAdmin;
use App\Controller\Backend\PostController as PostBackend;
use App\Controller\Backend\CommentController;
use App\Controller\Backend\UserController;
use App\Controller\Backend\ResetController;
use Core\View;
use Exception;

/**
 *
 */
class Router implements RouterInterface
{

    private $homeController;
    private $allPostsController;
    private $postFrontend;
    private $loginUser;
    private $registerUser;
    private $logoutUser;
    private $loginAdmin;
    private $logoutAdmin;
    private $registerAdmin;
    private $postBackend;
    private $commentBackend;
    private $userController;
    private $resetUser;
    private $view;

    public function __construct()
    {
        $this->homeController = new HomeController;
        $this->allPostsController = new AllPostsController;
        $this->postFrontend = new PostController;
        $this->loginUser = new LoginController;
        $this->registerUser = new RegisterController;
        $this->logoutUser = new LogoutController;
        $this->loginAdmin = new LoginAdmin;
        $this->logoutAdmin = new LogoutAdmin;
        $this->registerAdmin = new RegisterAdmin;
        $this->commentBackend = new CommentController;
        $this->postBackend = new PostBackend;
        $this->userController = new UserController;
        $this->resetUser = new ResetController;
        $this->view = new View;
    }

    public function run()
    {
        try{
            if (isset($_GET['route'])) {
                if ($_GET['route'] === 'post') {
                    $this->postFrontend->post($_GET['id']);
                }
                elseif ($_GET['route'] === 'all') {
                    $this->allPostsController->all();
                }
                elseif ($_GET['route'] === 'sendMail') {
                    $this->homeController->contact();
                }
                elseif ($_GET['route'] === 'saveComment') {
                    $this->postFrontend->saveComment();
                }
                elseif ($_GET['route'] === 'loginUser') {
                    $this->loginUser->loginPage();
                }
                elseif ($_GET['route'] === 'registerUser') {
                    $this->registerUser->registrationPage();
                }
                elseif ($_GET['route'] === 'addUser') {
                    $this->registerUser->addUser();
                }
                elseif ($_GET['route'] === 'userConnexion') {
                    $this->loginUser->userConnexion();
                }
                elseif ($_GET['route'] === 'loginAdmin') {
                    $this->loginAdmin->admin();
                }
                elseif ($_GET['route'] === 'registerAdmin') {
                    $this->registerAdmin->registration();
                }
                elseif ($_GET['route'] === 'savePost') {
                    $this->postBackend->savePost();
                }
                elseif ($_GET['route'] === 'listComments') {
                    $this->commentBackend->listComments();
                }
                elseif ($_GET['route'] === 'validateComment') {
                    $this->commentBackend->validateComment($_GET['id']);
                }
                elseif ($_GET['route'] === 'deleteComment') {
                    $this->commentBackend->deleteComment($_GET['id']);
                }
                elseif ($_GET['route'] === 'deleteComments') {
                    $this->commentBackend->deleteComments($_GET['idPost']);
                }
                elseif ($_GET['route'] === 'listPosts') {
                    $this->postBackend->listPosts();
                }
                elseif ($_GET['route'] === 'editPost') {
                    $this->postBackend->editPost($_GET['id']);
                }
                elseif ($_GET['route'] === 'updatePost') {
                    $this->postBackend->updatePost();
                }
                elseif ($_GET['route'] === 'deletePost') {
                    $this->postBackend->deletePost($_GET['id']);
                }
                elseif ($_GET['route'] === 'addAdmin') {
                    $this->registerAdmin->addAdmin();
                }
                elseif ($_GET['route'] === 'listAdmins') {
                    $this->userController->listAdmins();
                }
                elseif ($_GET['route'] === 'listUsers') {
                    $this->userController->listUsers();
                }
                elseif ($_GET['route'] === 'deleteAdmin') {
                    $this->userController->deleteAdmin($_GET['id']);
                }
                elseif ($_GET['route'] === 'deleteUser') {
                    $this->userController->deleteUser($_GET['id']);
                }
                elseif ($_GET['route'] === 'adminConnexion') {
                    $this->loginAdmin->adminConnect();
                }
                elseif ($_GET['route'] === 'logoutAdmin') {
                    $this->logoutAdmin->logoutAdmin();
                }
                elseif ($_GET['route'] === 'logoutUser') {
                    $this->logoutUser->logoutUser();
                }
                elseif ($_GET['route'] === 'confirmation') {
                    $this->registerUser->confirmation($_GET['token'], $_GET['id']);
                }
                elseif ($_GET['route'] === 'resetUser') {
                    $this->resetUser->resetUser();
                }
                elseif ($_GET['route'] === 'passUser') {
                    $this->resetUser->resetUserInfo();
                }
                elseif ($_GET['route'] === 'passwordResetUser') {
                    $this->resetUser->passwordResetUser($_GET['id'], $_GET['token']);
                }
                elseif ($_GET['route'] == 'changePassUser') {
                    $this->resetUser->passwordReset();
                }
                elseif ($_GET['route'] === 'resetAdmin') {
                    $this->resetUser->resetAdmin();
                }
                elseif ($_GET['route'] === 'passAdmin') {
                    $this->resetUser->resetAdminInfo();
                }
                elseif ($_GET['route'] === 'passwordResetAdmin') {
                    $this->resetUser->passwordResetAdmin($_GET['id'], $_GET['token']);
                }
                else {
                    $this->view->render('error', 'error', ['error'=>'Page introuvable']);
                }
            }
            else {
                $this->homeController->home();
            }
        }
        catch (Exception $e)
        {
            $this->view->render('error', 'error', ['error'=>$e->getMessage()]);
        }
    }
}

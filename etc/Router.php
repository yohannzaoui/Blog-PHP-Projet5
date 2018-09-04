<?php

namespace Core;

use App\controller\frontend\HomeController;
use App\controller\frontend\AllPostsController;
use App\controller\frontend\PostController;
use App\controller\frontend\LoginController;
use App\controller\frontend\RegisterController;
use App\controller\frontend\LogoutController;
use App\controller\backend\LoginController as LoginAdmin;
use App\controller\backend\LogoutController as LogoutAdmin;
use App\controller\backend\RegisterController as RegisterAdmin;
use App\controller\backend\PostController as PostBackend;
use App\controller\backend\CommentController;
use App\controller\backend\UserController;
use App\controller\backend\resetController;
use Core\View;
use Exception;

/**
 *
 */
class Router
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
        $this->resetUser = new resetController;
        $this->view = new View;
    }

    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'post'){
                    $this->postFrontend->post($_GET['id']);
                }
                elseif($_GET['route'] === 'all'){
                    $this->allPostsController->all();
                }
                elseif ($_GET['route'] === 'sendMail') {
                    $this->homeController->contact();
                }
                elseif($_GET['route'] === 'saveComment'){
                    $this->postFrontend->saveComment();
                }
                elseif($_GET['route'] === 'loginUser'){
                    $this->loginUser->loginPage();
                }
                elseif($_GET['route'] === 'registerUser'){
                    $this->registerUser->registrationPage();
                }
                elseif($_GET['route'] === 'addUser'){
                    $this->registerUser->addUser();
                }
                elseif($_GET['route'] === 'userConnexion'){
                    $this->loginUser->userConnexion();
                }
                elseif($_GET['route'] === 'loginAdmin'){
                    $this->loginAdmin->admin();
                }
                elseif($_GET['route'] === 'registerAdmin'){
                    $this->registerAdmin->registration();
                }
                elseif($_GET['route'] === 'savePost'){
                    $this->postBackend->savePost();
                }
                elseif($_GET['route'] === 'listComments'){
                    $this->commentBackend->listComments();
                }
                elseif($_GET['route'] === 'validateComment'){
                    $this->commentBackend->validateComment($_GET['id']);
                }
                elseif($_GET['route'] === 'deleteComment'){
                    $this->commentBackend->deleteComment($_GET['id']);
                }
                elseif($_GET['route'] === 'deleteComments'){
                    $this->commentBackend->deleteComments($_GET['idPost']);
                }
                elseif($_GET['route'] === 'listPosts'){
                    $this->postBackend->listPosts();
                }
                elseif($_GET['route'] === 'editPost'){
                    $this->postBackend->editPost($_GET['id']);
                }
                elseif($_GET['route'] === 'updatePost'){
                    $this->postBackend->updatePost();
                }
                elseif($_GET['route'] === 'deletePost'){
                    $this->postBackend->deletePost($_GET['id']);
                }
                elseif($_GET['route'] === 'addAdmin'){
                    $this->registerAdmin->addAdmin();
                }
                elseif($_GET['route'] === 'listAdmins'){
                    $this->userController->listAdmins();
                }
                elseif($_GET['route'] === 'listUsers'){
                    $this->userController->listUsers();
                }
                elseif($_GET['route'] === 'deleteAdmin'){
                    $this->userController->deleteAdmin($_GET['id']);
                }
                elseif($_GET['route'] === 'deleteUser'){
                    $this->userController->deleteUser($_GET['id']);
                }
                elseif($_GET['route'] === 'adminConnexion'){
                    $this->loginAdmin->adminConnect();
                }
                elseif($_GET['route'] === 'logoutAdmin'){
                    $this->logoutAdmin->logoutAdmin();
                }
                elseif($_GET['route'] === 'logoutUser'){
                    $this->logoutUser->logoutUser();
                }
                elseif ($_GET['route'] === 'confirmation') {
                    $this->registerUser->confirmation($_GET['token'], $_GET['id']);
                }
                elseif ($_GET['route'] === 'resetUser') {
                    $this->resetUser->resetUser();
                }
                elseif($_GET['route'] === 'passUser'){
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
                elseif($_GET['route'] === 'passAdmin'){
                    $this->resetUser->resetAdminInfo();
                }
                elseif ($_GET['route'] === 'passwordResetAdmin') {
                    $this->resetUser->passwordResetAdmin($_GET['id'], $_GET['token']);
                }
                else{
                    $this->view->render('error','error',['error'=>'Page introuvable']);
                }
            }
            else{
                $this->homeController->home();
            }
        }
        catch (Exception $e)
        {
            $this->view->render('error','error',['error'=>$e->getMessage()]);
        }
    }
}

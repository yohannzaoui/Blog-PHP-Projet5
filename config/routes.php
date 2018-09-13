<?php

return [
    'home' => [
        'path' => '/',
        'methods' => ['GET', 'POST'],
        'action' => App\Controller\Frontend\HomeController::class
    ],
    'all' => [
        'path' => '/all',
        'methods' => ['GET'],
        'action'  => App\Controller\Frontend\AllPostsController::class
    ],
    'post' => [
        'path' => '/post/{id}',
        'methods' => ['GET', 'POST'],
        'action' => App\Controller\Frontend\PostController::class,
        'params' =>['id' => '\d+']
    ],
    'loginUser' => [
        'path' => '/loginUser',
        'methods' => ['GET', 'POST'],
        'action' => App\Controller\Frontend\LoginController::class
    ],
    'registerUser' => [
        'path' => '/registerUser',
        'methods' => ['GET', 'POST'],
        'action' => App\Controller\Frontend\RegisterController::class
    ],
    'resetUser' => [
        'path' => '/resetUser',
        'methods' => ['GET', 'POST'],
        'action' => App\Controller\Frontend\ResetUserController::class
    ],
    'confirmationUser' => [
        'path' => '/confirmationUser',
        'methods' => ['GET'],
        'action' => App\Controller\Frontend\ConfirmationController::class
    ],
    'passwordUser' => [
        'path' => '/passwordResetUser',
        'methods' => ['GET', 'POST'],
        'action' => App\Controller\Frontend\PasswordUserController::class
    ],
    'passwordAdmin' => [
        'path' => '/passwordResetAdmin',
        'methods' => ['GET', 'POST'],
        'action' => App\Controller\Backend\PasswordAdminController::class
    ],
    'admin' => [
        'path' => '/admin',
        'methods' => ['GET', 'POST'],
        'action' => App\Controller\Backend\LoginController::class
    ],
    'registerAdmin' => [
        'path' => '/registerAdmin',
        'methods' => ['GET', 'POST'],
        'action' => App\Controller\Backend\RegisterAdminController::class
    ],
    'resetAdmin' => [
        'path' => '/resetAdmin',
        'methods' => ['GET', 'POST'],
        'action' => App\Controller\Backend\ResetAdminController::class
    ],
    'logoutAdmin' => [
        'path' => '/logoutAdmin',
        'methods' => ['GET'],
        'action' => App\Controller\Backend\LogoutController::class
    ],
    'logoutUser' => [
        'path' => '/logoutUser',
        'methods' => ['GET'],
        'action' => App\Controller\Frontend\LogoutController::class
    ],
    'addPost' => [
        'path' => '/addPost',
        'methods' => ['GET', 'POST'],
        'action' => App\Controller\Backend\AddPostController::class
    ],
    'listComment' => [
        'path' => '/listComments',
        'methods' => ['GET'],
        'action' => App\Controller\Backend\CommentController::class
    ],
    'listUsers' => [
        'path' => '/listUsers',
        'methods' => ['GET'],
        'action' => App\Controller\Backend\UserController::class
    ],
    'listAdmins' => [
        'path' => '/listAdmins',
        'methods' => ['GET'],
        'action' => App\Controller\Backend\AdminController::class
    ],
    'deleteAdmin' => [
        'path' => '/deleteAdmin/{id}',
        'methods' => ['GET'],
        'action' => App\Controller\Backend\AdminController::class,
        'params' =>['id' => '\d+']
    ],
    'deleteUser' => [
        'path' => '/deleteUser/{id}',
        'methods' => ['GET'],
        'action' => App\Controller\Backend\UserController::class,
        'params' =>['id' => '\d+']
    ],
    'listPosts' => [
        'path' => '/listPosts',
        'methods' => ['GET'],
        'action' => App\Controller\Backend\ListPostsController::class
    ],
    'deletePost' => [
        'path' => '/deletePost/{id}',
        'methods' => ['GET'],
        'action' => App\Controller\Backend\DeletePostController::class,
        'params' =>['id' => '\d+']
    ],
    'editPost' => [
        'path' => '/editPost/{id}',
        'methods' => ['GET'],
        'action' => App\Controller\Backend\EditPostController::class,
        'params' =>['id' => '\d+']
    ],
    'validateComment' => [
        'path' => '/validateComment/{id}',
        'methods' => ['GET'],
        'action' => App\Controller\Backend\ValidateCommentController::class,
        'params' =>['id' => '\d+']
    ],
    'deleteComment' => [
        'path' => '/deleteComment/{id}',
        'methods' => ['GET'],
        'action' => App\Controller\Backend\CommentController::class,
        'params' =>['id' => '\d+']
    ]
];

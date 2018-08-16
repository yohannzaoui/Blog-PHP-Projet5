<?php

namespace App\Action;

require 'vendor/autoload.php';

use App\Action\Interfaces\HomeControllerInterface;
use Core\Request;
use Core\View;
use App\Repository\PostRepository;

final class HomeController implements HomeControllerInterface
{
    private $post;
    private $view;

    public function __construct()
    {
        $this->post = new PostRepository;
        $this->view = new View;
    }

    public function __invoke(Request $request)
    {
      // Appel articles
      // Appel vue
      // Renvoie de la vue.
        $posts = $this->post->getRecentPosts();
        require 'templates/Home/index.php';
        $this->view->generer(array('posts' => $posts));
        //return $this->view->render('home', ['posts' => $posts]);
    }
}

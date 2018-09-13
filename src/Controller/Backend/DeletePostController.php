<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\DeletePostControllerInterface;
use App\Repository\PostRepository;
use Core\View;
use Core\Request;

/**
 *
 */
class DeletePostController implements DeletePostControllerInterface
{

    private $view;
    private $postRepository;

    public function __construct()
    {
        $this->view = new View;
        $this->postRepository = new PostRepository;
    }

    public function __invoke(Request $request)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $request->getParam('id');
            $this->postRepository->deletePost($id);
            header('location:..\listPosts');
        } else {
            $this->view->render('error', 'error', ['error'=>"Identifiant d'article manquant"]);
        }
    }
}

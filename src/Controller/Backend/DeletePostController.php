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

    /**
     * 
     */
    public function __construct()
    {
        $this->view = new View;
        $this->postRepository = new PostRepository;
    }

    /**
     * 
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('GET')) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $request->getParam('id');
                $idPost = $this->view->check($id);
                $this->postRepository->deletePost($idPost);
                $request->getSession()->flash('Article supprimé');
                header('location:..\listPosts');
            } else {
                $this->view->render('error', 'error', ['error' => "Identifiant d'article manquant"]);
            }
        } else {
            $this->view->render('error', 'error', ['error' => "system error"]);
        }

    }
}

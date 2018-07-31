<?php

require_once 'Models/PostManager.php';
require_once 'Models/CommentManager.php';
require_once 'Views/View.php';

class ControllerPost {

    private $post;
    private $comment;
    private $var;

    public function __construct() {
        $this->post = new PostManager();
        $this->comment = new CommentManager();
    }

    public function post($id) {
        $post = $this->post->getPost($id);
        $comments = $this->comment->valideComment($id);
        $view = new View("Post");
        $view->generer(array('post' => $post, 'comments' => $comments));
    }

    public function comment($author, $content, $idPost) {
        $this->comment->addComment($author, $content, $idPost);
        $this->post($idPost);
        if(isset($_POST['comment'])) {
            $sendOk = "Votre commentaire à été envoyé";
        }
    }

}


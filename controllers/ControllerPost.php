<?php

require_once 'Models/PostManager.php';
require_once 'Models/CommentManager.php';
require_once 'System/View.php';

class ControllerPost
{

    private $post;
    private $comment;

    const VALIDE_COMMENT = "Votre commentaire sera affiché après validation.";

    public function __construct()
    {
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
    }

    public static function valideComment() {
      return self::VALIDE_COMMENT;
    }

}

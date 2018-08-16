<?php

//namespace BlogControllers;
//require_once 'vendor/autoload.php';

require_once 'ControllerSecurity.php';
require_once 'src/Repository/PostRepository.php';
require_once 'src/Repository/CommentRepository.php';


class ControllerAdmin extends ControllerSecurity
{
    private $post;
    private $comment;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->post = new PostRepository();
        $this->comment = new CommentRepository();
    }

    public function index()
    {
        $nbBillets = $this->post->getNombreBillets();
        $nbCommentaires = $this->comment->getNombreCommentaires();
        $pseudo = $this->requete->getSession()->getAttribut("pseudo");
        $this->genererVue(array('nbBillets' => $nbBillets, 'nbCommentaires' => $nbCommentaires, 'pseudo' => $pseudo));
    }

}

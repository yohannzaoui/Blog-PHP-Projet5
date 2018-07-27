<?php

require_once('system/View.php');

class ControllerListPosts
{
    private $_postManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url)>1)
        {
            throw new Exception("Page introuvable");
        }
        else
        {
            $this->posts();
        }
    }

    private function posts()
    {
        $this->_postManager = new PostManager;
        $posts = $this->_postManager->getListPosts();
        $this->_view = new View('ListPosts');
        $this->_view->generate(array('posts'=>$posts));
    }
}
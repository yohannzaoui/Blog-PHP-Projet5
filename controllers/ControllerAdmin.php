<?php
function loadClasses($class) {
  require 'controllers/'.$class.'.php';
}
spl_autoload_register('loadClasses');
require_once 'System/View.php';

class ControllerAdmin {

  private $_postManager;

  public function add() {

    if (isset($_POST['send'],
              $_POST['title'],
              $_POST['subtitle'],
              $_POST['author'],
              $_POST['content'])) {

      if (!empty($_POST['title'])
          &&!empty($_POST['subtitle'])
          &&!empty($_POST['author'])
          &&!empty($_POST['content'])) {

        $post = new Post(['title'=>$_POST['title'],
                          'author'=>$_POST['author'],
                          'subtitle'=>$_POST['subtitle'],
                          'content'=>$_POST['content']]);

        $this->_postManager->addPost($post);
      }
    }
  }
}

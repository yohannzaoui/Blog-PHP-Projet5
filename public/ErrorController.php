<?php

 namespace App\controller;
 
 use Core\View;

 class ErrorController
 {
    private $view;

    public function __construct()
    {
        $this->view = new View;
    }

     public function unknown()
     {
        $this->view->render('unknown');
     }

     public function error($error)
     {
        $this->view->render('error',['error'=>$error]);
     }
 }
 

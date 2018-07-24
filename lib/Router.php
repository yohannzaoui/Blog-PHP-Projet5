<?php

require_once('views/view.php');
require_once('lib/Autoloader.php');

class Router {

    private $_ctrl;
    private $_view;

    public function routeReq() {

        try {

            Autoloader::register();

            $url = [];

            if(isset($_GET['url'])) {

                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

                $controller = ucfirst(strtolower($url[0]));

                $controllerClass = "Controller".$controller;

                $controllerFile = "controllers/".$controllerClass.".php"; 

                if(file_exists($controllerFile)) {
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }
                else {
                    throw new Exception('Page introuvable');
                }
            }
            else {
                require_once('controllers/ControllerHome.php');
                $this->_ctrl = new ControllerHome($url);
            }
        }

        catch(Exception $e) {

            $errorMsg = $e->getMessage();
            $this->_view = new View('Error');
            $this->_view->generate(array('errorMsg'=>$errorMsg));
        }
    }
}
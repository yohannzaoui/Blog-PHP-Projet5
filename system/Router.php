<?php


class Router {

    private $_ctrl;
    private $_view;

    public function routeReq() {

        try {

            spl_autoload_register(function($class){

                require_once('models/'.$class.'.php');
            });

            $url = [];

            if(isset($_get['url'])) {

                $url = explode('/', filter_var($_get['url'],FILTER_SANITIZE_URL));

                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                if(file_exists($controllerFile)) {

                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }
                else {

                    throw new Exception('page introuvable');
                }
            }
            else {

                require_once('controllers/ControllerHome.php');
                $this->_ctrl = new ControllerHome($url);
            }
        }
        catch(Exception $e) {

            $errorMsg = $e->getMessage();
            require_once 'views/viewError.php';
        }
    }
}
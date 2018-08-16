<?php

//namespace BlogFram;
//require_once 'vendor/autoload.php';
//use BlogControllers\ControllerHome;


require_once 'Controller.php';
require_once 'Request.php';
require_once 'View.php';


class Router
{

    /**
     * Méthode principale appelée par le contrôleur frontal
     * Examine la requête et exécute l'action appropriée
     */
    public function routerRequest()
    {
        try {
            // Fusion des paramètres GET et POST de la requête
            // Permet de gérer uniformément ces deux types de requête HTTP
            $request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action = $this->creerAction($request);

            $controller->executerAction($action);
        }
        catch (Exception $e) {
            $this->gererErreur($e);
        }
    }

    /**
     * Instancie le contrôleur approprié en fonction de la requête reçue
     *
     * @param Request $request Requête reçue
     * @return Instance d'un contrôleur
     * @throws Exception Si la création du contrôleur échoue
     */
    private function createController(Request $request)
    {
        // Grâce à la redirection, toutes les URL entrantes sont du type :
        // index.php?controller=XXX&action=YYY&id=ZZZ

        $controller = "Home";  // Contrôleur par défaut
        if ($request->existeParams('controller')) {
            $controller = $request->getParams('controller');
            // Première lettre en majuscules
            $controller = ucfirst(strtolower($controller));
        }
        // Création du nom du fichier du contrôleur
        // La convention de nommage des fichiers controllers est : controller/controller<$controller>.php
        $controllerClass = "Controller". $controller;
        $controllerFile = "src/Controllers/" . $controllerClass . ".php";
        if (file_exists($controllerFile)) {
            // Instanciation du contrôleur adapté à la requête
            require($controllerFile);
            $controller = new $controllerClass;
            $controller->setRequest($request);
            return $controller;
        }
        else {
            throw new Exception("Fichier '$controllerFile' introuvable");
        }
    }

    /**
     * Détermine l'action à exécuter en fonction de la requête reçue
     *
     * @param Request $request Requête reçue
     * @return string Action à exécuter
     */
    private function creerAction(Request $request)
    {
        $action = "index";  // Action par défaut
        if ($request->existeParams('action')) {
            $action = $request->getParams('action');
        }
        return $action;
    }

    /**
     * Gère une erreur d'exécution (exception)
     *
     * @param Exception $exception Exception qui s'est produite
     */
    private function gererErreur(Exception $exception)
    {
        $vue = new View('erreur');
        $vue->generer(array('msgErreur' => $exception->getMessage()));
    }

}

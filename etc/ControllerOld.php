<?php

//namespace BlogFram;
//require_once 'vendor/autoload.php';

require_once 'Configuration.php';
require_once 'request.php';
require_once 'View.php';


abstract class Controller
{
    /** Action à réaliser */
    private $action;

    /** Requête entrante */
    protected $request;

    /**
     * Définit la requête entrante
     *
     * @param request $request request entrante
     */
    public function setRequest(request $request)
    {
        $this->request = $request;
    }

    /**
     * Exécute l'action à réaliser.
     * Appelle la méthode portant le même nom que l'action sur l'objet controller courant
     *
     * @throws Exception Si l'action n'existe pas dans la classe controller courante
     */
    public function executerAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $ControllerClass = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $ControllerClass");
        }
    }

    /**
     * Méthode abstraite correspondant à l'action par défaut
     * Oblige les classes dérivées à implémenter cette action par défaut
     */
    public abstract function index();

    /**
     * Génère la vue associée au contrôleur courant
     *
     * @param array $viewData Données nécessaires pour la génération de la vue
     * @param string $action Action associée à la vue (permet à un contrôleur de générer une vue pour une action spécifique)
     */
    protected function genererVue($viewData = array(), $action = null)
    {
        // Utilisation de l'action actuelle par défaut
        $viewAction = $this->action;
        if ($action != null) {
            // Utilisation de l'action passée en paramètre
            $viewAction = $action;
        }
        // Utilisation du nom du contrôleur actuel
        $ControllerClass = get_class($this);
        $viewController = str_replace("Controller", "", $ControllerClass);

        // Instanciation et génération de la vue
        $view = new View($viewAction, $viewController);
        $view->generer($viewData);
    }

    /**
     * Effectue une redirection vers un contrôleur et une action spécifiques
     *
     * @param string $controller Contrôleur
     * @param type $action Action Action
     */
    protected function redirirect($controller, $action = null)
    {
        $rootWeb = Configuration::get("rootWeb", "/");
        // Redirection vers l'URL /racine_site/controller/action
        header("Location:" . $rootWeb . $controller . "/" . $action);
    }

}

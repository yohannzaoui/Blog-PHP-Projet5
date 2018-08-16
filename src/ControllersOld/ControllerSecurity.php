<?php

//namespace BlogControllers;
//require_once 'vendor/autoload.php';

require_once 'etc/Controller.php';


abstract class ControllerSecurity extends Controller
{

    public function executerAction($action)
    {
        // Vérifie si les informations utilisateur sont présents dans la session
        // Si oui, l'utilisateur s'est déjà authentifié : l'exécution de l'action continue normalement
        // Si non, l'utilisateur est renvoyé vers le contrôleur de connexion
        if ($this->request->getSession()->existeAttribut("idUtilisateur")) {
            parent::executerAction($action);
        }
        else {
            $this->redirect("connexion");
        }
    }

}

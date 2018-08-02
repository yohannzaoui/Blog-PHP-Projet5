<?php

function loadClasses($class) {
  require 'controllers/'.$class.'.php';
}
spl_autoload_register('loadClasses');
require_once 'Views/View.php';

class Router {

    private $ctrlHome,
            $ctrlPost,
            $ctrList;
            //$ctrlAdmin;

    public function __construct() {
        $this->ctrlHome = new ControllerHome();
        $this->ctrlPost = new ControllerPost();
        $this->ctrlList = new ControllerList();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerReq() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'post') {
                    $idPost = intval($this->getParametre($_GET, 'id'));
                    if ($idPost != 0) {
                        $this->ctrlPost->post($idPost);
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                }
                else if ($_GET['action'] == 'comment') {
                    $author = $this->getParametre($_POST, 'author');
                    $content = $this->getParametre($_POST, 'content');
                    $idPost = $this->getParametre($_POST, 'id');
                    $this->ctrlPost->comment($author, $content, $idPost);
                }
                else if ($_GET['action'] == 'list') {
                    $this->ctrlList->list();
                }
                //else if ($_GET['action'] == 'admin') {
                    //$this->ctrlAdmin->admin();
                //}
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlHome->home();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new View("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}

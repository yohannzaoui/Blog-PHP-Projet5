<?php

require_once 'Controllers/Frontend/ControllerHome.php';
require_once 'Controllers/Frontend/ControllerPost.php';
require_once 'Controllers/Frontend/ControllerListPosts.php';
require_once 'system/ViewFrontend.php';

class Router {

    private $_ctrlHome;
    private $_ctrlPost;
    private $_ctrlListPost;

    public function __construct() {
        $this->_ctrlHome = new ControllerHome();
        $this->_ctrlPost = new ControllerPost();
        $this->_ctrlListPost = new ControllerListPosts();

    }

    // Route une requête entrante : exécution l'action associée
    public function routerReq() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'post') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->_ctrlPost->post($idBillet);
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                }
                else if ($_GET['action'] == 'comment') {
                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $content = $this->getParametre($_POST, 'content');
                    $idPost = $this->getParametre($_POST, 'id');
                    $this->_ctrlPost->comment($pseudo, $content, $idPost);
                }
                else if ($_GET['action'] =='listposts') {
                    $this->_ctrlListPost->listPost();

                }
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->_ctrlHome->home();
            }
        }
        catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    // Affiche une erreur
    private function error($msgError) {
        $view = new ViewFrontend("Error");
        $view->createView(array('msgError' => $msgError));
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

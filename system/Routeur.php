<?php

require_once 'Controllers/ControllerHome.php';
require_once 'Controllers/ControllerPost.php';
require_once 'Controllers/ControllerListPosts.php';
require_once 'system/View.php';

class Routeur {

    private $_ctrlHome;
    private $_ctrlPost;
    private $_ctrllistPost;

    public function __construct() {
        $this->_ctrlHome = new ControllerHome();
        $this->_ctrlPost = new ControllerPost();
        $this->_ctrllistPost = new ControllerListPosts();

    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'post') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->_ctrlPost->billet($idBillet);
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                }
                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->_ctrlPost->commenter($auteur, $contenu, $idBillet);
                }
                else if ($_GET['action'] =='listposts') {
                    $this->_ctrllistPost->listPost();

                }
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->_ctrlHome->home();
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

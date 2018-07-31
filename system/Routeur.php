<?php

require_once 'Controllers/ControllerHome.php';
require_once 'Controllers/ControllerPost.php';
require_once 'Controllers/ControllerList.php';
require_once 'Views/View.php';

class Routeur {

    private $ctrlHome;
    private $ctrlPost;
    private $ctrList;

    public function __construct() {
        $this->ctrlHome = new ControllerHome();
        $this->ctrlPost = new ControllerPost();
        $this->ctrlList = new ControllerList();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
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
                else if ($_GET['action'] == 'List') {
                    $this->ctrlList->list();
                }
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

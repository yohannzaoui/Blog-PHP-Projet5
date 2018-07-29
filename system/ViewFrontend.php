<?php

class ViewFrontend {

    // Nom du _file associé à la vue
    private $_file;
    
    // Titre de la vue (défini dans le _file vue)
    private $_title;

    public function __construct($action) {
        // Détermination du nom du _file vue à partir de l'action
        $this->_file = "Views/Frontend/view" . $action . ".php";
    }

    // Génère et affiche la vue
    public function createView($data) {
        // Génération de la partie spécifique de la vue
        $content = $this->genererate_file($this->_file, $data);
        // Génération du gabarit commun utilisant la partie spécifique
        $view = $this->genererate_file('Views/Frontend/template.php',
                array('title' => $this->_title, 'content' => $content));
        // Renvoi de la vue au navigateur
        echo $view;
    }

    // Génère un _file vue et renvoie le résultat produit
    private function genererate_file($_file, $data) {
        if (file_exists($_file)) {
            // Rend les éléments du tableau $data accessibles dans la vue
            extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le _file vue
            // Son résultat est placé dans le tampon de sortie
            require $_file;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("_file '$_file' introuvable");
        }
    }

    private function clean($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }

}
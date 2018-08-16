<?php

namespace Core;


class View
{
    /** Nom du fichier associé à la vue */
    private $file;

    /** Titre de la vue (défini dans le fichier vue) */
    private $title;


    public function generer($data)
    {
        // Génération de la partie spécifique de la vue
        $content = $this->genererFichier($this->file, $data);
        // On définit une variable locale accessible par la vue pour la racine Web
        // Il s'agit du chemin vers le site sur le serveur Web
        // Nécessaire pour les URI de type controleur/action/id
        //$rootWeb = Configuration::get("rootWeb", "/");
        // Génération du gabarit commun utilisant la partie spécifique
        $view = $this->genererFichier('Templates/layout.php',
    array('title' => $this->title, 'content' => $content, /*'rootWeb' => $rootWeb*/));
        // Renvoi de la vue générée au navigateur
        echo $view;
    }

    /**
     * Génère un fichier vue et renvoie le résultat produit
     *
     * @param string $fichier Chemin du fichier vue à générer
     * @param array $donnees Données nécessaires à la génération de la vue
     * @return string Résultat de la génération de la vue
     * @throws Exception Si le fichier vue est introuvable
     */
    private function genererFichier($file, $data)
    {
        if (file_exists($file)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $file;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }


    private function check($value)
    {
        // Convertit les caractères spéciaux en entités HTML
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }

}

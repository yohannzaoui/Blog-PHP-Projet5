<?php

namespace Core;

use Exception;

/**
 *
 */
class View
{

    private $file;
    private $title;

    public function render($template, $path, $data = [])
    {
        $this->file = '../templates/'.$path.'/'.$template.'.php';
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../templates/layout/base.php', ['title'=> $this->title, 'content'=> $content]);
        echo $view;
    }

    private function renderFile($file, $data)
    {
        if(file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else {
            throw new Exception('Fichier vue inexistant');
        }
    }

    public function check($data)
    {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8', false);
    }
}

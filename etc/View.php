<?php

namespace Core;

use Core\Interfaces\ViewInterface;


/**
 * Class View
 * @package Core
 */
class View implements ViewInterface
{


    /**
     * @var
     */
    private $file;


    /**
     * @var
     */
    private $title;


    /**
     * @param $template
     * @param $path
     * @param array $data
     * @return false|string
     * @throws \Exception
     */
    public function render($template, $path, $data = [])
    {
        $this->file = '../templates/'.$path.'/'.$template.'.php';
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../templates/layout/base.php', ['title'=> $this->title, 'content'=> $content]);
        return $view;
    }


    /**
     * @param $file
     * @param $data
     * @return false|string
     * @throws \Exception
     */
    private function renderFile($file, $data)
    {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        } else {
            throw new \Exception('Fichier vue inexistant');
        }

    }


    /**
     * @param $data
     * @return string
     */
    public function check($data)
    {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8', false);
    }
}

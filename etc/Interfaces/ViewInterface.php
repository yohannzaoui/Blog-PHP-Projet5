<?php

namespace Core\Interfaces;


/**
 * Interface ViewInterface
 * @package Core\Interfaces
 */
interface ViewInterface
{
    /**
     * @param $template
     * @param $path
     * @param array $data
     * @return mixed
     */
    public function render($template, $path, $data = []);

    /**
     * @param $data
     * @return mixed
     */
    public function check($data);
}

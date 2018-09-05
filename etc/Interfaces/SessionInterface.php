<?php

namespace Core\Interfaces;

/**
 *
 */
interface SessionInterface
{
    public function sessionStart();

    public function sessionDestroy();

    public function add($name, $value);

    public function flash($message);

    public function existeSession($name);

    public function getSession($name);
}

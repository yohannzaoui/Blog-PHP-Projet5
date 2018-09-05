<?php

namespace Core;

use Core\Interfaces\CookieInterface;

/**
 *
 */
class Cookie implements CookieInterface
{

    public function set($name, $value)
    {
        return setcookie($name, $value, time() + 15*24*3600, null, null, false, true);
    }

    public function delete($name, $value)
    {
        return setcookie($name, $value,time()-1);
    }
}

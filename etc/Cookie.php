<?php

namespace Core;

class Cookie
{
    public function set($name, $pseudo)
    {
        return setcookie($name, $pseudo, time() + 365*24*3600, null, null, false, true);
    }
}

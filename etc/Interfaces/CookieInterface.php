<?php
namespace Core\Interfaces;

/**
 *
 */
interface CookieInterface
{
    public function set($name, $value);

    public function delete($name, $value);
}

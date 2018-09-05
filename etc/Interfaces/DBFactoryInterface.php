<?php

namespace Core\Interfaces;

/**
 *
 */
interface DBFactoryInterface
{
    public function sql($sql, $parameters = null);
}

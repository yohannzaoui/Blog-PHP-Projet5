<?php
namespace Core\Interfaces;


/**
 * Interface DBFactoryInterface
 * @package Core\Interfaces
 */
interface DBFactoryInterface
{
    /**
     * @param $sql
     * @param null $parameters
     * @return mixed
     */
    public function sql($sql, $parameters = null);
}

<?php

namespace Core;

use Exception;


abstract class Configuration
{

    private static $params;


    public static function get($name, $defaultValue = null)
    {
        $params = self::getParams();
        if (isset($params[$name])) {
            $value = $params[$name];
        }
        else {
            $value = $defaultValue;
        }
        return $value;
    }


    private static function getParams()
    {
        if (self::$params == null) {
            $filePath = "../config/dev.ini";
            if (!file_exists($filePath)) {
                $filePath = "../config/prod.ini";
            }
            if (!file_exists($filePath)) {
                throw new Exception("Aucun fichier de configuration trouvé");
            }
            else {
                self::$params = parse_ini_file($filePath);
            }
        }
        return self::$params;
    }
}

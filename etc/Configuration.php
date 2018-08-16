<?php

//namespace BlogFram;


class Configuration
{
    
    private static $params;

    
    public static function get($name, $defaultValue = null)
    {
        $params = self::getparams();
        if (isset($params[$name])) {
            $value = $params[$name];
        }
        else {
            $value = $defaultValue;
        }
        return $value;
    }

   
    private static function getparams()
    {
        if (self::$params == null) {
            $filePath = "config/dev.ini";
            if (!file_exists($filePath)) {
                $filePath = "config/prod.ini";
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

<?php

// Contrôleur frontal : instancie un routeur pour traiter la requête entrante


//require_once 'vendor/autoload.php';
require 'etc/Router.php';

$router = new Router();
$router->routerRequest();

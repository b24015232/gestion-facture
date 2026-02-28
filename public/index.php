<?php

define('ROOT', dirname(__DIR__));

require_once ROOT . '/app/Core/Autoloader.php';
\App\Core\Autoloader::register();

use App\Core\Router;
use App\Models\Facture;

session_start();

$router = new Router();
$router->run();


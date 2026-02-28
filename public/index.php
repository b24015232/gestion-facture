<?php

define('ROOT', dirname(__DIR__));

require_once ROOT . '/app/Core/Autoload.php';

use App\Core\Router;
use App\Models\Facture;

session_start();

$router = new Router();
$router->run();


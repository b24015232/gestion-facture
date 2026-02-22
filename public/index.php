<?php
use App\Core\Autoloader;
use App\Core\Router;

// 1. Chargement du moteur
require_once '../app/Core/Autoloader.php';
Autoloader::register();

// 2. Analyse de l'URL sans dépendre du .htaccess
// On récupère l'URI (ex: /projet/public/main/contact)
$uri = $_SERVER['REQUEST_URI'];

// On cherche où se trouve le mot "public" pour ne prendre que ce qui est APRES
$basePath = "/public/";

echo "le site est hébergé";
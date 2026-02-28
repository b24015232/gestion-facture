<?php

// On charge les variables du .env
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // On ignore les commentaires
        if (strpos(trim($line), '#') === 0) continue;

        // On sépare la clé et la valeur
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}

// Variable BD
define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_NAME', $_ENV['DB_NAME'] ?? '');
define('DB_USER', $_ENV['DB_USER'] ?? '');
define('DB_PASS', $_ENV['DB_PASS'] ?? '');

// Variable URL
define('URL_ROOT', 'https://ton-site.alwaysdata.net'); 

// Fuseau horaire
date_default_timezone_set('Europe/Paris');
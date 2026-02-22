<?php
namespace App\Core;

class Autoloader {
    static function register() {
        // Cette fonction de PHP va s'exécuter dès qu'on essaie
        // d'utiliser une classe qu'il ne connaît pas encore
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    static function autoload($class) {
        // 1. On récupère le nom de la classe avec son namespace (ex: App\Models\Invoice)
        // 2. On remplace "App\" par le chemin vers notre dossier "app/"
        $class = str_replace('App\\', '', $class);

        // 3. On remplace les "\" par des "/" pour que ça devienne un chemin de dossier
        $class = str_replace('\\', '/', $class);

        // 4. On construit le chemin complet vers le fichier
        // __DIR__ est le dossier actuel (app/Core), on remonte d'un cran
        $file = __DIR__ . '/../' . $class . '.php';

        // 5. Si le fichier existe, on l'inclut
        if (file_exists($file)) {
            require_once $file;
        }
    }
}
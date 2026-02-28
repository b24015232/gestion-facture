<?php
namespace App\Core;

class Router {
    public function run() {
        $uri = $_SERVER['REQUEST_URI'];

        // On nettoie l'URL (on retire le dernier slash s'il existe)
        if (!empty($uri) && $uri != '/' && $uri[-1] === '/') {
            $uri = substr($uri, 0, -1);
        }

        // On découpe l'URL
        $params = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($params); // On retire le premier élément vide

        // On récupère le nom du Controller 
        // On le met en Majuscule (ex: client -> ClientController)
        $controllerName = !empty($params[0]) ? ucfirst(array_shift($params)) : 'Main';
        $controllerClass = "App\Controllers\\" . $controllerName . "Controller";

        // On récupère le nom de la Méthode/Action
        $action = !empty($params[0]) ? array_shift($params) : 'index';

        // On vérifie si le Controller existe
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();

            // On vérifie si la méthode existe dans ce Controller
            if (method_exists($controller, $action)) {
                // On appelle la méthode et on passe le reste des paramètres (ex: l'ID)
                call_user_func_array([$controller, $action], $params);
            } else {
                http_response_code(404);
                echo "L'action n'existe pas.";
            }
        } else {
            http_response_code(404);
            echo "Le contrôleur n'existe pas.";
        }
    }
}
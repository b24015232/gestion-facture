<?php
namespace App\Controllers;

abstract class Controller {

    /**
     * Affiche une vue et lui passe des données
     * @param string $fichier Le chemin vers la vue (ex: 'test/index')
     * @param array $data Les données à envoyer (ex: ['titre' => 'Accueil'])
     */
    protected function render(string $fichier, array $data = []) {
        View::render($fichier, $data);
    }

    /**
     * Redirige l'utilisateur vers une autre URL
     * @param string $url L'URL de destination (ex: '/clients')
     */
    protected function redirect(string $url) {
        header('Location: ' . $url);
        exit;
    }
}
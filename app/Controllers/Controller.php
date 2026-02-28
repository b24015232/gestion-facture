<?php
namespace App\Controllers;

abstract class Controller {

    /**
     * Affiche une vue et lui passe des données
     * @param string $fichier Le chemin vers la vue (ex: 'test/index')
     * @param array $data Les données à envoyer (ex: ['titre' => 'Accueil'])
     */
    protected function render(string $fichier, array $data = []) {
        extract($data);

        // On construit le chemin absolu vers le fichier de vue
        $cheminVue = ROOT . '/app/Views/' . $fichier . '.php';

        if (file_exists($cheminVue)) {
            require_once $cheminVue;
        } else {
            die("Erreur : Le fichier de vue <strong>{$fichier}.php</strong> est introuvable.");
        }
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
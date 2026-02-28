<?php
namespace App\Controllers;

class TestController {

    public function index() {
        // 1. On prépare les données à envoyer au HTML
        $data = [
            'titre' => "Ma Super Page de Test",
            'nom'   => "Administrateur"
        ];

        // 2. La magie de PHP : on extrait les variables
        extract($data);

        // 3. On va chercher le fichier HTML directement
        $cheminVue = ROOT . '/app/Views/test.view.php';

        if (file_exists($cheminVue)) {
            require_once $cheminVue;
        } else {
            echo "Erreur : Le fichier de vue introuvable dans " . $cheminVue;
        }
    }
}
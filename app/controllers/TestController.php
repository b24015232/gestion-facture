<?php
namespace App\Controllers;

class TestController {

    /**
     * Cette méthode sera appelée par /test ou /test/index
     */
    public function index() {
        echo "<h1>Bravo !</h1>";
        echo "<p>Si tu vois ce message, c'est que ton Routeur fonctionne parfaitement.</p>";
    }

    /**
     * Cette méthode sera appelée par /test/bonjour/ton_nom
     * Le paramètre $nom est récupéré automatiquement par le Routeur !
     */
    public function bonjour(string $nom = 'Inconnu') {
        echo "<h1>Salut " . htmlspecialchars($nom) . " !</h1>";
        echo "<p>Le routeur a réussi à passer ton nom en paramètre à la fonction.</p>";
    }
}
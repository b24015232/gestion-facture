<?php
namespace App\Controllers;

// 1. L'héritage : on dit que TestController "est un" Controller
class TestController extends Controller {

    public function index() {
        // 2. On utilise l'outil render() qui appartient au parent ($this)
        $this->render('test', [
            'titre' => "Ma superbe page de test qu'Ilian le plus beau des développeurs a créée",
            'nom'   => "Le plus beau des développeurs"
        ]);
    }

}
<?php
namespace App\Controllers;

// 1. L'héritage : on dit que TestController "est un" Controller
class TestController extends Controller {

    public function index() {
        // On demande l'affichage de la vue et on lui glisse les fichiers CSS et JS !
        $this->render('test', [
            'titre' => 'Page de Test avec JS',
            'nom'   => 'Administrateur',
            
            // On ajoute le CSS spécifique à cette page
            'css'   => [
                '/css/test.css',
            ],
            
            // On ajoute le JS spécifique
            'js'    => [
                '/js/test.js'
            ]
        ]);
    }

}
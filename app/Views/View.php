<?php
namespace App\Views;

class View {

    /**
     * Génère l'affichage final
     * @param string $fichier Le chemin de la vue (ex: 'client/index')
     * @param array $data Les variables à passer à la vue
     * @param string $layout Le gabarit à utiliser (par défaut 'layout')
     */
    public static function render(string $fichier, array $data = [], string $layout = 'layout') {
        extract($data);

        // On démarre l'enregistrement en mémoire
        ob_start();

        // On inclut la vue spécifique (qui va utiliser les variables)
        $cheminVue = ROOT . '/app/Views/' . $fichier . '.php';
        if (file_exists($cheminVue)) {
            require $cheminVue;
        } else {
            echo "<h1>Erreur : La vue $fichier est introuvable.</h1>";
        }

        // On stocke ça dans la variable $contenu (qui est utilisée dans layout.php !)
        $contenu = ob_get_clean();

        // On inclut le Layout principal qui va afficher le contenu
        require_once ROOT . '/app/Views/' . $layout . '.php';
    }
}
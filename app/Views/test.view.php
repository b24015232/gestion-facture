<div class="test-container">
    
    <h1><?= $titre ?? 'Page de Test' ?></h1>
    
    <div class="carte-bienvenue">
        <p>Bonjour <strong><?= $nom ?? 'Visiteur' ?></strong> !</p>
        <p>Ce texte représente le contenu spécifique de ma vue.</p>
    </div>

    <ul>
        <li>Étape 1 : Le Controller appelle cette vue.</li>
        <li>Étape 2 : ob_start() aspire tout ce code HTML.</li>
        <li>Étape 3 : Ce code est stocké dans la variable $contenu.</li>
        <li>Étape 4 : Le layout l'affiche au milieu de la page !</li>
    </ul>

</div>
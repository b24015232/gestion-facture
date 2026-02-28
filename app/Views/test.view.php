<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
</head>
<body>
    <div style="text-align: center; margin-top: 50px; font-family: sans-serif;">
        
        <h1><?= $titre ?></h1>
        
        <p>Bonjour <strong><?= $nom ?></strong>, bienvenue sur ta première vue MVC !</p>
        
        <p style="color: green;">Si tu vois ce texte formaté, c'est que le Controller a réussi à envoyer les données au fichier HTML.</p>

    </div>
</body>
</html>
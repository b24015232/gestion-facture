<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?? 'Gestion de Factures' ?></title>
    
    <!-- Le CSS globale pour toute l'application -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- On vérifie si des fichiers CSS ont été spécifiés -->
    <?php if (isset($css) && is_array($css)): ?>
        <?php foreach ($css as $fichierCss): ?>
            <link rel="stylesheet" href="<?= htmlspecialchars($fichierCss) ?>">
        <?php endforeach; ?>
    <?php endif; ?>

</head>
<body>

    <?php require_once ROOT . '/app/Views/includes/header.php'; ?>

    <main class="container">
        <?= $contenu ?>
    </main>

    <?php require_once ROOT . '/app/Views/includes/footer.php'; ?>

    <!-- On vérifie si des fichiers JS ont été spécifiés -->
    <?php if (isset($js) && is_array($js)): ?>
        <?php foreach ($js as $fichierJs): ?>
            <script src="<?= htmlspecialchars($fichierJs) ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
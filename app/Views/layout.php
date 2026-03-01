<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?? 'Gestion de Factures' ?></title>
</head>
<body>

    <?php require_once ROOT . '/app/Views/includes/nav.php'; ?>

    <main class="container">
        <?= $contenu ?>
    </main>

    <?php require_once ROOT . '/app/Views/includes/footer.php'; ?>

</body>
</html>
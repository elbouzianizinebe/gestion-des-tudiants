<?php
session_start();
$erreur = $_SESSION['erreur'] ?? '';
unset($_SESSION['erreur']); // bach ma yb9ach ybane mra tanya
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Autho</title>
</head>
<body>
    <?php if ($erreur): ?>
        <p style="color:red;"><?= htmlspecialchars($erreur) ?></p>
    <?php endif; ?>
    <a href="login.php">3awed jerreb</a>
</body>
</html>
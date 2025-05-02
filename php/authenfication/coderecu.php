<?php
require_once __DIR__.'../bdconfig/sessionInclude.php';
session_start(); 
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Code reçu</title>
    <link rel="stylesheet" href="../../css/validation.css">
</head>
<body>
    <h1>Code reçu par courriel</h1>

    <div class="millieu">
        <div class="containant">
            <h2>Validation d'identité</h2>
            <p>Un code de sécurité à 6 chiffres a été envoyé à l'adresse de courriel <strong><?php echo htmlspecialchars($_SESSION['sessionTemporaire']['courriel']); ?></strong>.</p>

            <p>Veuillez saisir le code de sécurité reçu et appuyer sur 'Valider'.</p>

            <form method="POST" action="../php/authentification/verificationcode.php">
                <input type="text" name="code" placeholder="Code de sécurité (6 chiffres)" maxlength="6" required>
                <button class="btn" type="submit">Valider</button>
            </form>

        </div>
    </div>

    <?php
    if (isset($_SESSION['code'])) {
        echo "<p>Votre code est : " . $_SESSION['code'] . "</p>";
    } else {
        echo "<p>Aucun code trouvé dans la session.</p>";
    }
    ?> 
</body>
</html>

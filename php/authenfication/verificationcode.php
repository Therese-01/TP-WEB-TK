<?php
require_once __DIR__.'/../bdconfig/sessionInclude.php';
session_start();

if (isset($_POST['valider'])) {
    //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $code_saisi = filter_input(INPUT_POST,"code",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //$code_saisi = $_POST['code'] ?? '';

        
        if (isset($_SESSION['sessionTemporaire'])) {
            $code_attendu = $_SESSION['sessionTemporaire']['code'];
            if ($code_saisi == $code_attendu) {
                // Code valide on passe à la vraie session
                $nomutilisateurs = $_SESSION['sessionTemporaire']['nomutilisateurs'];
                $courriel = $_SESSION['sessionTemporaire']['courriel'];

                // vérification du courriel
                $courriel = filter_input(INPUT_POST,$courriel, FILTER_VALIDATE_EMAIL);

                // Détruit toutes les variables de session
                $_SESSION = array();

                // Si vous voulez détruire complètement la session, effacez également
                // le cookie de session.
                // Note : cela détruira la session et pas seulement les données de session !
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(session_name(), '', time() - 60*60*24*30,
                        $params["path"], $params["domain"],
                        $params["secure"], $params["httponly"]
                    );
                }

                // Finalement, on détruit la session.
                session_destroy();

                // Créer une nouvelle session
                session_start();
                $_SESSION['nomutilisateurs'] = $nomutilisateurs;
                $_SESSION['courriel'] = $courriel;

                header("Location: /TK_PROJET_WEB_APPLICATION/php/connexion.php"); // Redirection après vérification
                exit;

            } else {
                echo "Code incorrect.";
            }
        } else {
            echo "Session expirée ou invalide.";
        }

    //}
}
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

            <form method="POST" action="/TK_PROJET_WEB_APPLICATION/php/authenfication/verificationcode.php">
                <input type="text" name="code" placeholder="Code de sécurité (6 chiffres)" maxlength="6" required>
                <button class="btn" type="submit" name="valider">Valider</button>
            </form>

        </div>
    </div>

</body>
</html>
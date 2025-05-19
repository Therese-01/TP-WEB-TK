<?php
require_once '/home/tokoh25techinfo4/bdconfig/sessionInclude.php';
session_start();

try {
    if (isset($_POST['valider'])) {
        $code_saisi = filter_input(INPUT_POST,"code",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        
        if (isset($_SESSION['sessionTemporaire'])) {
            $code_attendu = $_SESSION['sessionTemporaire']['code'];
            if ($code_saisi == $code_attendu) {
                // Code valide on passe à la vraie session
                $nomutilisateurs = $_SESSION['sessionTemporaire']['nomutilisateurs'];
                $courriel = $_SESSION['sessionTemporaire']['courriel'];


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
                
                // Journalisation de la connexion réussie
                $logfile = '/home/tokoh25techinfo4/logs/connexionreussis.log'; // Emplacement du fichier log

                $logMessage = sprintf(
                    "[%s] Connexion réussie : %s depuis IP %s\n",
                    date('Y-m-d H:i:s'),
                    $courriel,
                    $_SERVER['REMOTE_ADDR']
                );

                // Écrire dans le fichier log
                file_put_contents($logfile, $logMessage, FILE_APPEND | LOCK_EX);
                header("Location: /TK_PROJET_WEB_APPLICATION/php/connexion.php"); // Redirection après vérification
                exit;

            } else {
                header("Location: ../erreur.php");
            }
        } else {
            header("Location: ../erreur.php");
        }
    }
} catch (Exception $e) 
    {
        exit();
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
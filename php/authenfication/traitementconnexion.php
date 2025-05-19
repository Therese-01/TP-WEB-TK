<?php
require_once '/home/tokoh25techinfo4/bdconfig/sessionInclude.php';
require_once '/home/tokoh25techinfo4/bdconfig/bd.includeInscription.php';
function log_ecriture_bd($courriel, $action, $details = '') {
    $logfile = '/home/tokoh25techinfo4/logs/ecriture_base_de_donnée.log';
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date('Y-m-d H:i:s');
    $log = "[$date] Écriture BD : $action | Utilisateur : $courriel | IP : $ip | Détails : $details\n";
    file_put_contents($logfile, $log, FILE_APPEND | LOCK_EX);
}


try {
    $db = new PDO (
    "mysql:host=".BDSERVEUR. ";dbname=" . BDSCHEMA,
        BDUTILISATEUR_ECRIRE, 
        BDMDP
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e)
{
    header("Location: ../erreur.php");
}

try {
    if (isset($_POST['inscription'])) {
        $nomutilisateurs = filter_input(INPUT_POST,"nomutilisateurs",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $courriel = filter_input(INPUT_POST,"courriel", FILTER_VALIDATE_EMAIL);
        $motdepasse = filter_input(INPUT_POST,"motdepasse",FILTER_DEFAULT);

        // 🔒 Vérification des champs obligatoires
        if (empty($nomutilisateurs) || empty($courriel) || empty($motdepasse)) {
            header("Location: ../erreur.php");
            exit(); 
        }

        // Hash du mot de passe AVANT insertion
        $motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);

        // Vérifier si l'utilisateur existe déjà (par courriel)
        $verification_compte = $db->prepare("SELECT * FROM utilisateurs WHERE courriel = :courriel");
        $verification_compte->bindParam(':courriel', $courriel,PDO::PARAM_STR);
        $verification_compte->execute();

        if ($verification_compte->rowCount() > 0) {
            header("Location: ../erreur.php");
        } else {
            // Insérer le nouvel utilisateur
            $requete = $db->prepare("INSERT INTO utilisateurs VALUES (0,  :nomutilisateurs, :courriel, :motdepasse)");
            $requete->execute(
                array(
                "nomutilisateurs" => $nomutilisateurs,
                "courriel" => $courriel,
                "motdepasse" => $motdepasse
                )
            );
            log_ecriture_bd($courriel, 'Création de compte', "Nom d'utilisateur : $nomutilisateurs");

            // Connexion immédiate de l'utilisateur après l'inscription réussie
            session_start();  // Démarrer la session
            $_SESSION['nomutilisateurs'] = $nomutilisateurs;
            $_SESSION['courriel'] = $courriel;
            header("Location: ../../php/connexion.php"); // Redirection après vérification
            exit;
        }
    }
} catch (Exception $e) 
    {
        header("Location: ../erreur.php");
        exit();
    }
?>
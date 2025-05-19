<?php
require_once '/home/tokoh25techinfo4/bdconfig/sessionInclude.php';
require_once '/home/tokoh25techinfo4/bdconfig/bd.include.php';

function log_echec_connexion($courriel, $raison) {
    $logfile = '/home/tokoh25techinfo4/logs/connexionrecue.log';
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date('Y-m-d H:i:s');
    $log = "[$date] Échec de connexion : $courriel | Raison : $raison | IP : $ip\n";
    file_put_contents($logfile, $log, FILE_APPEND | LOCK_EX);
}
session_start();

try {
    $db = new PDO (
        "mysql:host=".BDSERVEUR. ";dbname=" . BDSCHEMA,
        BDUTILISATEUR_LIRE, 
        BDMDP
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e)
{
    exit();
}

try {
    if (isset($_POST['connexion'])) {
        $courriel = filter_input(INPUT_POST,"courriel", FILTER_VALIDATE_EMAIL);
        $motdepasse = filter_input(INPUT_POST,"motdepasse",FILTER_DEFAULT);

        if (!$courriel || !$motdepasse) {
            $_SESSION['erreur_connexion'] = "Format de courriel ou mot de passe invalide.";
            log_echec_connexion($courriel ?? 'non fourni', 'Format invalide');
            header("Location: ../erreur.php");  // Mets ici le chemin correct de ton formulaire
            exit;
        }

        

        // Préparer la requête pour vérifier si l'utilisateur existe
        $verification_compte = $db->prepare("SELECT * FROM utilisateurs WHERE courriel = :courriel");
        $verification_compte->bindParam(':courriel', $courriel,PDO::PARAM_STR);
        $verification_compte->execute();

        if ($verification_compte->rowCount() == 0) {
            $_SESSION['erreur_connexion'] = "Courriel introuvable.";
            log_echec_connexion($courriel, 'Courriel inexistant');
            header("Location: ../erreur.php");
            exit;
        }
        

        if ($verification_compte->rowCount() > 0) {
            $user = $verification_compte->fetch(PDO::FETCH_ASSOC);

            if (!password_verify($motdepasse, $user['motdepasse'])) {
                $_SESSION['erreur_connexion'] = "Mot de passe incorrect.";
                log_echec_connexion($courriel, 'Mot de passe incorrect');
                header("Location: ../erreur.php");
                exit;
            }
            // Vérification du mot de passe haché
            if (password_verify($motdepasse, $user['motdepasse'])) {
                //session_start();

                // je viens de créer une session temporaire avec les infos + le code de vérification
                $_SESSION['sessionTemporaire'] = [
                    'nomutilisateurs' => $user['nomutilisateurs'],
                    'courriel' => $user['courriel'],
                    'code' => rand(100000, 999999)
                ];

                function envoyerMail($to, $message) {
                    $subject = 'Code de vérification';
                    $headers = 
                    'From: tokoh25techinfo4@techinfo420.ca' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                
                    return mail($to, $subject, $message, $headers);    
                }
                
                // j'envoi le mail
                if (envoyerMail($_SESSION['sessionTemporaire']['courriel'], "Votre code est : " . $_SESSION['sessionTemporaire']['code'])) {
                    header('Location: /TK_PROJET_WEB_APPLICATION/php/authenfication/verificationcode.php');
                    header("Location: ../erreur.php");
                    exit;
                } else {

                    exit;
                }

            } else {
                exit;
            }
        } else {
            exit;
        }
    }
} catch (Exception $e) 
    {
        exit();
    }
?>
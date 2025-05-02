<?php
require_once __DIR__.'/../bdconfig/sessionInclude.php';
$dbname = "tokoh25techinfo4_TKBUY";
$utilisateur = "tokoh25techinfo4_therese_lire";
$mdp = "Madeleine@1965";

try {
    $db = new PDO ("mysql:host=localhost;dbname=$dbname", $utilisateur, $mdp);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e)
{
    echo "Erreur :".$e->getMessage();
    exit();
}

if (isset($_POST['connexion'])) {
    $courriel = filter_input(INPUT_POST,"courriel", FILTER_VALIDATE_EMAIL);
    $motdepasse = filter_input(INPUT_POST,"motdepasse",FILTER_DEFAULT);

    if (!$courriel || !$motdepasse) {
        echo  "Erreur :erreurFormat";
        exit;
    }

    #test

    // Préparer la requête pour vérifier si l'utilisateur existe
    $verification_compte = $db->prepare("SELECT * FROM utilisateurs WHERE courriel = :courriel");
    $verification_compte->bindParam(':courriel', $courriel,PDO::PARAM_STR);
    $verification_compte->execute();

    if ($verification_compte->rowCount() > 0) {
        $user = $verification_compte->fetch(PDO::FETCH_ASSOC);

        // Vérification du mot de passe haché
        if (password_verify($motdepasse, $user['motdepasse'])) {
            session_start();
            
            // $_SESSION['nomutilisateurs'] = $user['nomutilisateurs'];
            
            //$_SESSION['courriel'] =$courriel;

            // $code = rand(100000,999999);

            // $_SESSION['code'] = $code;


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
                exit;
            } else {
                echo "Erreur lors de l'envoi du courriel.";
                exit;
            }

            //je crée le code ensuite j'envoie le mail. je mets le code dans une variable de session
            // header("Location: ../php/connexion.php");
            // exit;
        } else {
            echo "Erreur lors de session=erreur.";
            exit;
        }
    } else {
        echo "Erreur compteInexistant.";
        exit;
    }
}
?>
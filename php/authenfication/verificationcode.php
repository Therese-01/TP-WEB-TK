<?php
require_once __DIR__.'../bdconfig/sessionInclude.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code_saisi = $_POST['code'] ?? '';

    if (isset($_SESSION['sessionTemporaire'])) {
        $code_attendu = $_SESSION['sessionTemporaire']['code'];

        if ($code_saisi == $code_attendu) {
            // Code valide on passe à la vraie session
            $nomutilisateurs = $_SESSION['sessionTemporaire']['nomutilisateurs'];
            $courriel = $_SESSION['sessionTemporaire']['courriel'];

            // vérification du mot de passe
            $courriel = filter_input($courriel, FILTER_VALIDATE_EMAIL);

            // Détruire la session temporaire
            //session_unset();
            session_destroy();

            // Créer une nouvelle session
            session_start();
            $_SESSION['nomutilisateurs'] = $nomutilisateurs;
            $_SESSION['courriel'] = $courriel;

            header("Location : ../../php/connexion.php"); // Redirection après vérification
            exit;

        } else {
            $erreur = "Code incorrect.";
        }
    } else {
        $erreur = "Session expirée ou invalide.";
    }

}
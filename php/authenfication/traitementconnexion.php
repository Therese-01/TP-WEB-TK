<?php
require_once __DIR__.'../bdconfig/sessionInclude.php';
$dbname = "tokoh25techinfo4_TKBUY";
$utilisateur = "tokoh25techinfo4_therese_ecrire";
$mdp = "Madeleine@1965";

try {
    $db = new PDO ("mysql:host=localhost;dbname=$dbname", $utilisateur, $mdp);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e)
{
    echo "Erreur :".$e->getMessage();
}

if (isset($_POST['inscription'])) {
    $nomutilisateurs = $_POST['nomutilisateurs'];
    $courriel = $_POST['courriel'];
    $motdepasse = $_POST['motdepasse'];

    // Hash du mot de passe AVANT insertion
    $motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);

    // vérification du mot de passe
    $courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);

    // Vérifier si l'utilisateur existe déjà (par courriel)
    $verification_compte = $db->prepare("SELECT * FROM utilisateurs WHERE courriel = :courriel");
    $verification_compte->execute(['courriel' => $courriel]);

    if ($verification_compte->rowCount() > 0) {
        echo ("l'utilisateur exite deja");
       
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
        // Connexion immédiate de l'utilisateur après l'inscription réussie
        session_start();  // Démarrer la session
        $_SESSION['nomutilisateurs'] = $nomutilisateurs;
        $_SESSION['courriel'] = $courriel;

    }
}
?>
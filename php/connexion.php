<?php
require_once __DIR__.'/bdconfig/sessionInclude.php';
session_start();

// Vérifie que l'utilisateur est connecté
if (!isset($_SESSION['nomutilisateurs'])) {
    header("Location: ./login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de vente d'accessoires électroniques</title>
    <link rel="stylesheet" href="../css/connexion.css">
    <link rel="stylesheet" href="../js/recherche.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="../php/index.php"><i>TK Buy</i></div></a>
            <div class="icons">
                <form class="search" action="#" method="GET">
                    <input type="text" class="recherche" placeholder="Recherche..."/>
                    <span class="search">
                        <i><button type="submit" class="fas fa-search"></i></button>
                    </span>
                </form>

                <span class="account">
                    <a href="../php/connexion.php">
                        <i class="fas fa-user account-icon"></i>
                    </a>
                </span> 
                
                <span>
                    <a href="../php/panier.php">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </span>    
            </div>
        </div>
    </header>

    <div class="dashboard">

        <div class="welcome-box">
            <h1>Bonjour <?= htmlspecialchars($_SESSION['nomutilisateurs']) ?> !</h1>
        </div>

    </div>

    <div class="commun">
        <button type="submit"><a href="/TK_PROJET_WEB_APPLICATION/php/authenfication/deconnexion.php" style="text-decoration:none">Deconnexion</button></a>
        <button type="submit"><a href="./login.php" style="text-decoration:none">Connexion</button></a>
    </div>
    

</html>    
</body>
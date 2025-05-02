<?php
require_once __DIR__.'/bdconfig/sessionInclude.php';
session_start();
// Vérifie que l'utilisateur est connecté
if (!isset($_SESSION['nomutilisateurs'])) {
    header("Location: ../php/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Téléviseurs, cinéma maison et accessoires</title>
    <link rel="stylesheet" href="../css/categorie.css">
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

    <h1>Coup d'oeil rapide sur les Téléviseurs, cinéma maison et accessoires</h1>
    <?php
    $produits = [
        ["image" => "../images/tele.jpg", "alt" => "Tele", "nom" => "Support mural avancé", "prix" => "33$"],
        ["image" => "../images/tele1.jpg", "alt" => "Tele1", "nom" => "Meuble TV Madesa", "prix" => "36$"]
    ];
    ?>

    <div class="container">
        <?php foreach ($produits as $produit) { ?>
            <div class="card">
                <img src="<?= $produit['image']; ?>" alt="<?= $produit['alt']; ?>">
                <h2><?= $produit['nom']; ?></h2>
                <p><?= $produit['prix']; ?></p>
                <form action="../php/panier.php" method="post">
                    <input type="hidden" name="nom" value="<?= $produit['nom']; ?>">
                    <input type="hidden" name="prix" value="<?= $produit['prix']; ?>">
                    <input type="hidden" name="image" value="<?= $produit['image']; ?>">
                    <button type="submit" class="add-to-cart">
                        <i class="fas fa-shopping-cart"></i> Ajouter au panier
                    </button>
                </form>
            </div>
        <?php } ?>
    </div>
</body>
</html>

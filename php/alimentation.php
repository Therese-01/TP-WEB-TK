<?php
require_once __DIR__.'../bdconfig/sessionInclude.php';
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
    <title>Barres d'alimentations</title>
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

    <h1>Coup d'oeil rapide sur la barre d'alimentation</h1>
    <?php
        $produits = [
            ["image" => "../images/alimentation.webp", "alt" => "Alimentation", "nom" => "Usmixi 14-in-1", "prix" => "20$"],
            ["image" => "../images/alimentation1.webp", "alt" => "Alimentation1", "nom" => "Surge Protector", "prix" => "50$"],
            ["image" => "../images/alimentation2.webp", "alt" => "Alimentation2", "nom" => "Desk Clamp", "prix" => "20$"],
            ["image" => "../images/alimentation3.webp", "alt" => "Alimentation3", "nom" => "Multiprise", "prix" => "25$"],
            ["image" => "../images/alimentation4.webp", "alt" => "Alimentation4", "nom" => "W LAIWO", "prix" => "75$"],
            ["image" => "../images/alimentation5.webp", "alt" => "Alimentation5", "nom" => "Compact Cube Surge", "prix" => "5$"],
            ["image" => "../images/alimentation6.webp", "alt" => "Alimentation6", "nom" => "14 in 1 power adapter", "prix" => "29$"],
            ["image" => "../images/alimentation7.webp", "alt" => "Alimentation7", "nom" => "Industrial DIN Rail", "prix" => "31$"],
            ["image" => "../images/alimentation8.webp", "alt" => "Alimentation8", "nom" => "Gfci Outlet", "prix" => "15$"],
            ["image" => "../images/alimentation9.webp", "alt" => "Alimentation9", "nom" => "Prise de Rail DIN Ignifuge", "prix" => "22$"],
            ["image" => "../images/alimentation10.webp", "alt" => "Alimentation10", "nom" => "Black outlet", "prix" => "25$"]
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

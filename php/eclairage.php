<?php
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
    <title>Éclairage</title>
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

    <h1>Coup d'oeil rapide sur l'Éclairage</h1>
    
    <?php
    $produits = [
        ["image" => "../images/eclaire1.webp", "alt" => "Éclairage1", "nom" => "LED ZOMEI", "prix" => "20$"],
        ["image" => "../images/eclaire2.webp", "alt" => "Éclairage2", "nom" => "Lighting Global", "prix" => "55$"],
        ["image" => "../images/eclaire3.webp", "alt" => "Éclairage3", "nom" => "Capteur LED", "prix" => "52$"],
        ["image" => "../images/eclaire4.webp", "alt" => "Éclairage4", "nom" => "Projecteur de lumière", "prix" => "22$"],
        ["image" => "../images/eclaire5.webp", "alt" => "Éclairage5", "nom" => "Super Lighting Factory", "prix" => "20$"],
        ["image" => "../images/eclaire6.webp", "alt" => "Éclairage6", "nom" => "Boluoova", "prix" => "10$"],
        ["image" => "../images/eclaire7.webp", "alt" => "Éclairage7", "nom" => "HOTU Carwow", "prix" => "55$"],
        ["image" => "../images/eclaire8.webp", "alt" => "Éclairage8", "nom" => "Lampe LED", "prix" => "22$"],
        ["image" => "../images/eclaire9.webp", "alt" => "Éclairage9", "nom" => "Guitare Astronaute", "prix" => "15$"],
        ["image" => "../images/eclaire10.webp", "alt" => "Éclairage10", "nom" => "Projecteur LED", "prix" => "13$"],
        ["image" => "../images/eclaire11.webp", "alt" => "Éclairage11", "nom" => "Projecteur Lumineux", "prix" => "10$"]
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

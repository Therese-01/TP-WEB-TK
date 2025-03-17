<?php
session_start();
$nombreArticles = isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éclairage</title>
    <link rel="stylesheet" href="../css/categorie.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="../php/index.php"><i>TK Buy</i></div></a>
            <div class="nav-links">
                <a href="#">Service</a>
                <a href="#">Langue</a>
            </div>
            <div class="icons"> 
                <span class="account">
                    <a href="../php/connexion.php">
                        <i class="fas fa-user account-icon"></i>
                    </a>
                </span> 
                <span class="search">
                    <i class="fas fa-search"></i>
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
    $products = [
        ["image" => "../images/eclaire1.webp", "alt" => "Éclairage1", "title" => "LED ZOMEI", "description" => "20$"],
        ["image" => "../images/eclaire2.webp", "alt" => "Éclairage2", "title" => "Lighting Global", "description" => "55$"],
        ["image" => "../images/eclaire3.webp", "alt" => "Éclairage3", "title" => "Capteur LED", "description" => "52$"],
        ["image" => "../images/eclaire4.webp", "alt" => "Éclairage4", "title" => "Projecteur de lumière", "description" => "22$"],
        ["image" => "../images/eclaire5.webp", "alt" => "Éclairage5", "title" => "Super Lighting Factory", "description" => "20$"],
        ["image" => "../images/eclaire6.webp", "alt" => "Éclairage6", "title" => "Boluoova", "description" => "10$"],
        ["image" => "../images/eclaire7.webp", "alt" => "Éclairage7", "title" => "HOTU Carwow", "description" => "55$"],
        ["image" => "../images/eclaire8.webp", "alt" => "Éclairage8", "title" => "Lampe LED", "description" => "22$"],
        ["image" => "../images/eclaire9.webp", "alt" => "Éclairage9", "title" => "Guitare Astronaute", "description" => "15$"],
        ["image" => "../images/eclaire10.webp", "alt" => "Éclairage10", "title" => "Projecteur LED", "description" => "13$"],
        ["image" => "../images/eclaire11.webp", "alt" => "Éclairage11", "title" => "Projecteur Lumineux", "description" => "10$"]
    ];
    ?>

    <div class="container">
        <?php foreach ($products as $product) : ?>
            <div class="card">
                <img src="<?= $product['image'] ?>" alt="<?= $product['alt'] ?>">
                <h2><?= $product['title'] ?></h2>
                <p><?= $product['description'] ?></p>
                <form action="../php/panier.php" method="post">
                    <input type="hidden" name="nom" value="<?= $produit['nom']; ?>">
                    <input type="hidden" name="prix" value="<?= $produit['description']; ?>">
                    <button type="submit" class="add-to-cart">
                        <i class="fas fa-shopping-cart"></i> Ajouter au panier
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>


    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Informations sur l’entreprise</h3>
                <ul>
                    <li><a href="#">À propos de TK Buy</a></li>
                    <li><a href="#">Contactez-nous</a></li>
                    <li><a href="#">Presse</a></li>
                </ul>
            </div>
    
            <div class="footer-section">
                <h3>Service client</h3>
                <ul>
                    <li><a href="#">Politique de retour et de remboursement</a></li>
                    <li><a href="#">Politique en matière de propriété intellectuelle</a></li>
                    <li><a href="#">Informations de livraison</a></li>
                    <li><a href="#">Vos rappels et alertes sur la sécurité des produits</a></li>
                    <li><a href="#">Signaler une activité suspecte</a></li>
                </ul>
            </div>
    
            <div class="footer-section">
                <h3>Aide</h3>
                <ul>
                    <li><a href="#">Centre d’aide et FAQ</a></li>
                    <li><a href="#">Centre de sécurité</a></li>
                    <li><a href="#">Protection des achats sur TK Buy</a></li>
                    <li><a href="#">Devenir partenaire de TK Buy</a></li>
                </ul>
            </div>
        </div>
    </footer>
    
    <footer class="footer-bottom">
        <div class="legal-links">
            <p>© 2025 TK Buy Inc. 
                <a href="condition.php"><u>Conditions d'utilisation</u></a>
                <a href="#"><u>Politique de confidentialité</u></a> 
                <a href="#"><u>Vos choix en matière de confidentialité</u></a> 
            </p>
        </div>
    </footer>

</body>
</html>

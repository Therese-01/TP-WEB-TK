<?php
session_start();
$nombreArticles = isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barres d'alimentations</title>
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

    <h1>Coup d'oeil rapide sur la barre d'alimentation</h1>
    <?php
        $produits = [
            ["image" => "../images/alimentation.webp", "alt" => "Alimentation", "nom" => "Usmixi 14-in-1", "description" => "20$"],
            ["image" => "../images/alimentation1.webp", "alt" => "Alimentation1", "nom" => "Surge Protector", "description" => "50$"],
            ["image" => "../images/alimentation2.webp", "alt" => "Alimentation2", "nom" => "Desk Clamp", "description" => "20$"],
            ["image" => "../images/alimentation3.webp", "alt" => "Alimentation3", "nom" => "Multiprise", "description" => "25$"],
            ["image" => "../images/alimentation4.webp", "alt" => "Alimentation4", "nom" => "W LAIWO", "description" => "75$"],
            ["image" => "../images/alimentation5.webp", "alt" => "Alimentation5", "nom" => "Compact Cube Surge", "description" => "5$"],
            ["image" => "../images/alimentation6.webp", "alt" => "Alimentation6", "nom" => "14 in 1 power adapter", "description" => "29$"],
            ["image" => "../images/alimentation7.webp", "alt" => "Alimentation7", "nom" => "Industrial DIN Rail", "description" => "31$"],
            ["image" => "../images/alimentation8.webp", "alt" => "Alimentation8", "nom" => "Gfci Outlet", "description" => "15$"],
            ["image" => "../images/alimentation9.webp", "alt" => "Alimentation9", "nom" => "Prise de Rail DIN Ignifuge", "description" => "22$"],
            ["image" => "../images/alimentation10.webp", "alt" => "Alimentation10", "nom" => "Black outlet", "description" => "25$"]
        ];
    ?>

    <div class="container">
        <?php foreach ($produits as $produit) : ?>
            <div class="card">
                <img src="<?= $produit['image']; ?>" alt="<?= $produit['alt']; ?>">
                <h2><?= $produit['nom']; ?></h2>
                <p><?= $produit['description']; ?></p>
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

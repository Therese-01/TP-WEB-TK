<?php
session_start();
$nombreArticles = isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0;
?>
    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessoires pour jeux vidéo</title>
    <link rel="stylesheet" href="../css/panier.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="../php/index.php"><i>TK Buy</i></a></div>
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
                <span class="panier">
                    <a href="../php/panier.php">
                        <i class="fas fa-shopping-cart"></i>
                        <?php if ($nombreArticles > 0): ?>
                            <span class="panier-nb"><?= $nombreArticles; ?></span>
                        <?php endif; ?>
                    </a>
                </span>   
            </div>
        </div>
    </header>


    <main>
        <div class="cart-container">
            <div class="login-section">
                <h1>Mon panier</h1>
                <?php if ($nombreArticles > 0): ?>
                    <ul class="pan-liste">
                        <?php foreach ($_SESSION['panier'] as $produit): ?>
                            <li>
                                <?= htmlspecialchars($produit['nom']); ?> - <?= number_format($produit['prix'], 2, ',', ' '); ?> €
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: 
                ?>
                    <div class="vide-cart">
                        <p><strong><b>Votre panier</b></strong> est vide.</p>
                        <p>Je me laisse tenter !</p>
                        <form action="../php/index.php" method="get">
                            <button class="explorer-btn" type="submit">Découvrez nos meilleurs vendeurs</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

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
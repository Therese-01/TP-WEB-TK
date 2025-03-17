<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stockage de données</title>
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

    <h1>Coup d'oeil rapide sur les Stockage de données</h1>
    <?php
    $products = [
        ["image" => "../images/stock.webp", "alt" => "Stock", "title" => "Disque dur externe portable", "description" => "16$"],
        ["image" => "../images/stock1.webp", "alt" => "Stock1", "title" => "Clé USB", "description" => "15$"]
    ];
    ?>

    <div class="container">
        <?php foreach ($products as $product) : ?>
            <div class="card">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['alt']) ?>">
                <h2><?= htmlspecialchars($product['title']) ?></h2>
                <p><?= htmlspecialchars($product['description']) ?></p>
                <form action="../php/panier.php" method="post">
                    <input type="hidden" name="title" value="<?= htmlspecialchars($product['title']) ?>">
                    <input type="hidden" name="price" value="<?= htmlspecialchars($product['description']) ?>">
                    <button type="submit" name="add_to_cart" class="add-to-cart">
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

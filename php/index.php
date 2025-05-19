<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de vente d'accessoires électroniques</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../js/recherche.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><i>TK Buy</i></div>
            <div class="icons">
                <form class="search" action="#" method="GET">
                    <input type="text" placeholder="Recherche..." id="recherche"/>
                    <span class="search">
                        <button type="submit"><i class="fas fa-search"></i></button>
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
    <div class="video-containeur">
        <video autoplay loop muted>
            <source src="../video/mavid.mp4" type="video/mp4">
        </video>
    </div>

    <?php

    $categories = [
        ["id" => "television", "image" => "../images/television.webp", "nom" => "Téléviseurs, cinéma maison et accessoires"],
        ["id" => "ordinateur", "image" => "../images/ordinateur.webp", "nom" => "Ordinateurs, tablettes et accessoires"],
        ["id" => "telephone", "image" => "../images/telephone.webp", "nom" => "Cellulaires"],
        ["id" => "ecoute", "image" => "../images/ecouteur.webp", "nom" => "Écouteurs"],
        ["id" => "jeux", "image" => "../images/jeu_vido.webp", "nom" => "Accessoires et équipement de jeu pour PC"],
        ["id" => "photo", "image" => "../images/camera.webp", "nom" => "Photos"],
        ["id" => "stockage", "image" => "../images/stockage.webp", "nom" => "Stockage de données"],
        ["id" => "auto", "image" => "../images/automobile.webp", "nom" => "Automobile"],
        ["id" => "alimentation", "image" => "../images/ali.webp", "nom" => "Barres d'alimentation"],
        ["id" => "eclairage", "image" => "../images/eclairage.webp", "nom" => "Éclairage"],
        ["id" => "hubs", "image" => "../images/hub.webp", "nom" => "Hubs et Adaptateurs"],
        ["id" => "pile", "image" => "../images/pile.webp", "nom" => "Piles et Gadgets USB"],
    ];
    ?>
    <h2>Magasinez par catégorie</h2>
    <section class="categories">
        
        <div class="categories-grid">
            <?php for ($i = 0; $i < count($categories); $i += 4) { ?>
                <div class="conteneur-categorie">
                    <?php for ($j = $i; $j < $i + 4 && $j < count($categories); $j++) { ?>
                        <div class="category">
                            <a href="categorie.php?cat=<?= $categories[$j]['id'] ?>">
                                <img src="<?= $categories[$j]['image'] ?>" alt="<?= $categories[$j]['nom'] ?>">
                                <p><?= $categories[$j]['nom'] ?></p>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php }?>
        </div>
    </section>


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

</html>    
</body>
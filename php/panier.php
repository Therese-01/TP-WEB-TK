<?php
session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Gestion suppression d'abord
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['supprimer'])) {
    $nomProduit = $_POST['supprimer'];

    foreach ($_SESSION['panier'] as $key => $produit) {
        if ($produit['nom'] === $nomProduit) {
            unset($_SESSION['panier'][$key]);
            break;
        }
    }

    $_SESSION['panier'] = array_values($_SESSION['panier']);

    // Redirection pour éviter la double soumission
    header('Location: panier.php');
    exit();
}

// Gestion ajout produit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nom'], $_POST['prix'], $_POST['image'])) {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $image = $_POST['image'];

    $produit = [
        'nom' => $nom,
        'prix' => $prix,
        'image' => $image
    ];

    // Vérifie si le produit est déjà dans le panier
    $trouve = false;
    foreach ($_SESSION['panier'] as $item) {
        if ($item['nom'] == $nom) {
            $trouve = true;
            break;
        }
    }

    if (!$trouve) {
        $_SESSION['panier'][] = $produit;
    }

    header('Location: panier.php');
    exit();
}

// Nombre d'articles
$nombreArticles = count($_SESSION['panier']);
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
                <span class="panier">
                    <a href="../php/panier.php">
                        <i class="fas fa-shopping-cart"></i>
                        <?php if ($nombreArticles > 0) { ?>
                            <span class="panier-nb"><?= $nombreArticles; ?></span>
                        <?php } ?>
                    </a>
                </span>   
            </div>
        </div>
    </header>

    <section>
        <?php if (!empty($_SESSION['panier'])) { ?>
            <table>
                <tr>
                    <th></th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
                <?php
                $totalPanier = 0;
                foreach ($_SESSION['panier'] as $produit) {
                    $totalPanier += $produit['prix'];
                    ?>
                    <tr>
                        <td><img src="<?= $produit['image']; ?>" width="50"></td>
                        <td><?= $produit['nom']; ?></td>
                        <td><?= $produit['prix']; ?></td>
                        <td><button type="button" class="supprimer" data-nom="<?= $produit['nom']; ?>"><img src="../images/im2.JPG"></button></td>
                    </tr>
                <?php } ?>
                <tr class="total">
                    <th colspan="2">Total :</th>
                    <th><?= $totalPanier; ?>$</th>
                </tr>
            </table>
        <?php } else {
        echo "<p>Votre panier est vide.</p>";
        } ?>
    </section>
    
    <script src="../js/panierSupprimer.js"></script>


    

</body>
</html> 
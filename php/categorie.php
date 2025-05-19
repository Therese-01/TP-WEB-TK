<?php
require_once '/home/tokoh25techinfo4/bdconfig/sessionInclude.php';
require_once '/home/tokoh25techinfo4/bdconfig/bd.include.php';

try {
    $db = new PDO (
        "mysql:host=" . BDSERVEUR . ";dbname=" . BDSCHEMA,
        BDUTILISATEUR_LIRE,
        BDMDP
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //echo "Erreur : " . $e->getMessage();
    exit();
}

session_start();

if (!isset($_SESSION['nomutilisateurs'])) {
    header("Location: ../php/login.php");
    exit;
}

// Lire la catégorie depuis l'URL
$nomCategorie = $_GET['cat'] ?? '';

if (empty($nomCategorie)) {
    ////echo "Aucune catégorie spécifiée.";
}

// Chercher l’Id de la catégorie
$stmtCat = $db->prepare("SELECT idCategories FROM Categories WHERE Nom_Categories = ?");
$stmtCat->execute([$nomCategorie]);
$idCat = $stmtCat->fetchColumn();

if (!$idCat) {
    ////echo "Catégorie inconnue.";
    exit();
}

// Récupérer tous les produits de cette catégorie
$stmt = $db->prepare("SELECT Nom, Prix, Image FROM Produit WHERE Categorie_id = ?");
$stmt->execute([$idCat]);
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(ucfirst($nomCategorie)) ?></title>
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

    <h1>Coup d'oeil rapide sur : <?= htmlspecialchars(ucfirst($nomCategorie)) ?></h1>

    <div class="container">
        <?php foreach ($produits as $produit) { ?>
            <div class="card">
                <img src="../<?= htmlspecialchars($produit['Image']) ?>" alt="<?= htmlspecialchars($produit['Nom']) ?>">
                <h2><?= htmlspecialchars($produit['Nom']) ?></h2>
                <p><?= htmlspecialchars($produit['Prix']) ?></p>
                <form action="panier.php" method="post">
                    <input type="hidden" name="nom" value="<?= htmlspecialchars($produit['Nom']) ?>">
                    <input type="hidden" name="prix" value="<?= htmlspecialchars($produit['Prix']) ?>">
                    <input type="hidden" name="image" value="<?= htmlspecialchars($produit['Image']) ?>">
                    <button type="submit" class="add-to-cart">
                        <i class="fas fa-shopping-cart"></i> Ajouter au panier
                    </button>
                </form>
            </div>
        <?php } ?>
    </div>
</body>
</html>

<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Produits - REDBOUL</title>
    <link rel="stylesheet" href="style-index.css"> <!-- Lien vers votre fichier CSS -->
</head>
<body>


    <!-- Contenu principal -->
    <main class="container">
        <h1 class="title-product">Nos Produits</h1>

    <!-- Bouton pour ajouter un nouvel article -->
        <div class="add-product">
            <a href="ajouter_produit.php" class="button-ajout">Ajouter un nouvel article</a>
        </div>

        <!-- Grille des produits -->
        <div class="product-grid">
            
            <!-- Carte d'un produit -->
            <div class="product-card">
                <img src="image/produit1.jpg" alt="Nom du Produit" class="product-image">
                <h2 class="product-name">Produit 1</h2>
                <p class="product-description">Description du produit 1. Ce produit est très utile.</p>
                <p class="product-price">25,99 €</p>
                <div class="product-actions">
                    <a href="#" class="btn btn-edit">Modifier</a>
                    <a href="#" class="btn btn-delete">Supprimer</a>
                </div>
            </div>

            <!-- Répétez cette structure pour d'autres produits -->
            <div class="product-card">
                <img src="image/redboul5.jpeg" alt="Nom du Produit" class="product-image">
                <h2 class="product-name">Produit 2</h2>
                <p class="product-description">Description du produit 2. Un autre produit de qualité.</p>
                <p class="product-price">45,00 €</p>
                <div class="product-actions">
                    <a href="#" class="btn btn-edit">Modifier</a>
                    <a href="#" class="btn btn-delete">Supprimer</a>
                </div>
            </div>

            <!-- Continuez à ajouter d'autres produits de la même manière -->
            
        </div>
    </main>

</body>
</html>

<?php
include 'footer.php'; 





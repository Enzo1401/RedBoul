<?php
include 'header.php';
include 'BDD/bdd.php';

echo "<body class='body1'>";
echo "<link rel='stylesheet' href='style-index.css'>";

// Requête pour récupérer les produits
$produits = $bdd->query("SELECT * FROM produit")->fetchAll();

echo "<main class='container'>";
echo "<h1 class='title-product'>Nos Produits</h1>";

// Bouton pour ajouter un nouvel article
echo "<div class='add-product'>";
echo "<a href='ajouter_produit.php' class='button-ajout'>Ajouter un nouvel article</a>";
echo "</div>";

// Grille des produits
echo "<div class='product-grid'>";

foreach ($produits as $produit) {
    echo "
    <div class='product-card'>
        <img src='" . $produit['images'] . "' alt='" . $produit['nom'] . "' class='product-image'>
        <h2 class='product-name'>" . $produit['nom'] . "</h2>
        <p class='product-description'>" . $produit['descriptions'] . "</p>
        <p class='product-price'>" . $produit['prix'] . " €</p>
        <div class='product-actions'>
            <a href='modifyProduct.php?id=" . $produit['id_produit'] . "' class='btn btn-edit'>Modifier</a>
            <a href='deleteProduct.php?id=" . $produit['id_produit'] . "' class='btn btn-delete'>Supprimer</a>
        </div>
    </div>";
}

echo "</div>"; // Fermeture de la grille des produits
echo "</main>";

echo "</body>";

include 'footer.php';
?>
 





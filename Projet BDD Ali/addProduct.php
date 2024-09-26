<?php
include("BDD/bdd.php");

$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$quantite = $_POST['quantite'];
// Vérifie si le fichier a été uploadé sans erreurs
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Récupérer le nom du fichier
    $imageName = $_FILES['image']['name'];
}
$imageName = "image/" . $imageName;

$addProduct = $bdd ->prepare('INSERT INTO produit(nom, prix, descriptions, images, stock) VALUES(?, ?, ?, ?, ?)');

if($addProduct -> execute([$nom, $prix, $description, $imageName, $quantite]))
{
include 'header.php';
    //créer un message de succès
    echo '<div style="text-align: center; margin-top: 100px;">';
    echo '<h2>Votre produit a bien été ajouté !</h2>';
    echo '<a href="index.php" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Revenir à l\'accueil</a>';
    echo '</div>';
    include 'footer.php';

    
}
else
{
    //créer un message d'erreur
    include 'header.php';
    echo '<div style="text-align: center; margin-top: 20px;">';
    echo '<h2>Une erreur est survenue lors de l\'ajout du produit.</h2>';
    echo '<a href="index.php" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #f44336; color: white; text-decoration: none; border-radius: 5px;">Revenir à l accueil</a>';
    echo '</div>';
    include 'footer.php';
}



?>

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
    //ne rien faire
}
else
{
    //créer un message d'erreur
}
?>
<?php
// Récuperer la base de données 
include("BDD/bdd.php");

// Récuperer les variables de commande et d'info user
$product = $_POST['produit'];
$quantite = $_POST['quantite'];
$name = $_POST['nom'];
$prenom = $_POST['prenom'];
$address = $_POST['adresse'];
$mail = $_POST['email'];
$commentaireClient = $_POST['message'];
$date = date("Y-m-d");

$sendCommande = $bdd ->prepare('INSERT INTO commandes(id_produit, quantite, date_commande, commentaire) VALUES(?, ?, ?, ?)');
$stockUser = $bdd ->prepare('INSERT INTO users(nom, prenom, adresse, email) VALUES(?, ?, ?, ?)');

if($stockUser -> execute([$name, $prenom, $address, $mail]))
{
    if($sendCommande -> execute([$product, $quantite, $date, $commentaireClient]))
    {
        echo "Votre commande a bien été prise en compte";
    }
else
{
    echo "Une erreur s'est produite durant la validation de votre commande, merci de réessayer plus tard";
}
}
else
{
    echo "Une erreur s'est produite durant la validation de votre commande, merci de réessayer plus tard";
}

?>
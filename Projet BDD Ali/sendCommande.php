<?php

include('BDD/bdd.php');

try {
    // Récupérer les variables POST
    $product = $_POST['produit'];
    $quantite = $_POST['quantite'];
    $name = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $address = $_POST['adresse'];
    $mail = $_POST['email'];
    $commentaireClient = $_POST['message'];
    $date = date("Y-m-d");
    $password = sha1($_POST['password']); // Sécuriser le mot de passe avec SHA1 (bien que bcrypt soit recommandé)

    // Vérifier si l'utilisateur existe
    $verif = $bdd->prepare('SELECT * FROM users WHERE email = ?');
    $verif->execute([$mail]);

    if ($verif->rowCount() > 0) {
        // L'utilisateur existe
        $result = $verif->fetch(PDO::FETCH_ASSOC);

        if (empty($result['adresse'])) {
            // Mettre à jour l'adresse si elle est vide
            $updateUser = $bdd->prepare('UPDATE users SET adresse = ? WHERE id_users = ?');
            $updateUser->execute([$address, $result['id_users']]);
        }

        // Insérer la commande pour l'utilisateur existant
        $sendCommande = $bdd->prepare('INSERT INTO commandes(id_produit, quantite, date_commande, commentaire, id_users) VALUES(?, ?, ?, ?, ?)');
        $sendCommande->execute([$product, $quantite, $date, $commentaireClient, $result['id_users']]);
    } else {
        // L'utilisateur n'existe pas : créer un nouvel utilisateur et insérer la commande
        $insertUser = $bdd->prepare('INSERT INTO users(nom, prenom, email, mdp, adresse) VALUES(?, ?, ?, ?, ?)');
        $insertUser->execute([$name, $prenom, $mail, $password, $address]);

        // Récupérer l'ID de l'utilisateur inséré
        $userId = $bdd->lastInsertId();

        // Insérer la commande
        $sendCommande = $bdd->prepare('INSERT INTO commandes(id_produit, quantite, date_commande, commentaire, id_users) VALUES(?, ?, ?, ?, ?)');
        $sendCommande->execute([$product, $quantite, $date, $commentaireClient, $userId]);
    }

    // Afficher le message de confirmation
    echo "<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Confirmation de Commande</title>
        <link rel='stylesheet' href='style-sendCommande.css'>
    </head>
    <body>
        <div class='order-message'>
            Votre commande a bien été prise en compte
        </div>
        <a href='index.php' class='btn-redirect'>Retour à l'accueil</a>
    </body>
    </html>";
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Erreur</title>
        <link rel='stylesheet' href='style-sendCommande.css'>
    </head>
    <body>
        <div class='order-message' style='background-color: #dc3545;'>
            Une erreur s'est produite : " . htmlspecialchars($e->getMessage()) . "
        </div>
        <a href='index.php' class='btn-redirect'>Retour à l'accueil</a>
    </body>
    </html>";
}
?>

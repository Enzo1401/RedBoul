<?php
session_start()
?>

<header>
    <!-- Autres éléments de votre header -->

    <?php if (isset($_SESSION['id_users'])): ?>
        <!-- Si l'utilisateur est connecté, afficher le bouton de déconnexion -->
        <a href="deconnexion.php" class="button">Déconnexion</a>
    <?php else: ?>
        <!-- Si l'utilisateur n'est pas connecté, afficher le bouton de connexion -->
        <a href="connexion.php" class="button">Connexion</a>
    <?php endif; ?>

</header>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-header.css">
    
    <title>REDBOUL</title>
</head>

<body>
    <!--header-->
    <header class="header" id="mainHeader">
        <div class="logo">
            <a href="index.php"><img src="image/redboul.jpeg" alt="logo de l'entreprise"></a>
        </div>
        <div class="logos">
            <a href="index.php"><h1 class="title-header">REDBOUL</h1></a>
        </div>
        <nav>
            <ul class="color">
                <li><a href="index.php" class="no-decoration">Accueil</a></li>
                <li><a href="produit.php" class="no-decoration">Nos produits</a></li>
                <li><a href="commande.php" class="no-decoration">Commander</a></li>
                <?php if (isset($_SESSION['id_users'])): ?>
                    <!-- Si l'utilisateur est connecté, afficher le bouton de déconnexion -->
                    <li><a href="deconnexion.php" class="button">Déconnexion</a></li>
                <?php else: ?>
                    <!-- Si l'utilisateur n'est pas connecté, afficher le bouton de connexion -->
                    <li><a href="connexion.php" class="button">Connexion</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
</body>
</html>

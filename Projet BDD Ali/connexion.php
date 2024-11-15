<?php
include("header.php");
?>

<?php
include("BDD/bdd.php");
$users = $bdd->query("SELECT * FROM users")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link rel="stylesheet" href="style-connexion.css">
</head>
<body>

    <form action=".php" method="post" class="form">
        <div>
            <label for="email"></label>
            <input type="email" name="email" id="email" placeholder="Entrez votre adresse mail" required>
        </div>
        <div>
            <label for="password"></label>
            <input type="text" name="password" id="password" placeholder="Entrez votre mot de passe" required>
        </div>
        <div>
            <button type="submit" class="button">Se connecter</button>
        </div>
        <div>
            <a href="creationCompte.php" id="creationCompte">Créer un compte</a>
        </div>
    </form>
</body>
</html>
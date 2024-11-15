<?php
include("header.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-connexion.css">
    <title>Mon compte</title>
</head>
<body>

    <form action="index.php" method="POST">
        <div>
            <label class="champ" id="enter_mail" for="mail">
                <input type="email" name="mail" id="mail" placeholder="Entrez votre e-mail">
            </label>
        </div>

        <div>
            <label class="champ" id="enter_password" for="password">
                <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe">
            </label>
        </div>

        <div>
            <label for="submit">
                <input class="send_btn" type="submit" name="send">
            </label>
        </div>

        <span>
            <p>Vous n'avez pas de compte ? </p>
        </span>
        <span>
            <a class='last_element' href="inscription.php"><p>Créez en un !</p></a>
        </span>
    </form>

</body>
</html>

<?php
include("footer.php")
?>
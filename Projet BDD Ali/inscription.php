<?php
include("header.php");
?>
<?php
include("BDD/bdd.php");

if(!empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['prenom']) and !empty($_POST['nom'])){
    $name = htmlspecialchars($_POST['prenom']);
    $lastname = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['email']);
    $password = sha1($_POST['password']);

    $insert = $bdd->prepare('INSERT INTO users(nom, prenom, email, mdp) VALUES(?, ?, ?, ?)');

    if($insert ->execute(array($lastname, $name, $mail, $password))){
        echo "<div class='order-message'>
                Votre compte a été créé avec succès !
            </div>";

        $recupUser = $bdd ->prepare('SELECT id_users FROM users WHERE email = ? AND mdp = ?');
        $recupUser ->execute(array($mail, $password));
        if($recupUser ->rowCount() > 0){
            $_SESSION['prenom'] = $name;
            $_SESSION['nom'] = $lastname;
            $_SESSION['email'] = $mail;
            $_SESSION['password'] = $password;
            $_SESSION['id_users'] = $recupUser ->fetch()['id_users'];
        }
    }
    else{
        echo "<div class='order-message' style='background-color: #dc3545;'>
                Une erreur s'est produite durant la création de votre compte, merci de réessayer plus tard
            </div>";
    }
}
else{
    echo "<div class='order-message' style='background-color: #dc3545;'>
                Veuillez remplir tous les champs du formulaire
            </div>";
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander un produit</title>

    <link rel="stylesheet" href="style-inscription.css">
</head>
<body>

    <form action="inscription.php" method="post" class="form">
        <div>
            <label for="nom"></label>
            <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" required>
        </div>

        <div>
            <label for="prenom"></label>
            <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom" required>
        </div>

        <div>
            <label for="email"></label>
            <input type="email" name="email" id="email" placeholder="Entrez votre adresse mail" required>
        </div>

        <div>
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required>
        </div>

        <div>
            <button type="submit" class="button">S'inscrire</button>
        </div>

        <span>
            <p>Vous avez déjà un compte ? </p>
        </span>
        <span>
            <a class='last_element' href="connexion.php"><p>Connectez-vous !</p></a>
        </span>

    </form>

</body>
</html>

<?php
include("footer.php");
?>
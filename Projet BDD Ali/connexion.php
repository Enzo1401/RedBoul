<?php
include("header.php");
include("BDD/bdd.php");
session_start(); // Démarre une session pour gérer l'authentification

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'email et le mot de passe envoyés par l'utilisateur
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Préparer une requête pour vérifier si l'utilisateur existe avec cet email et ce mot de passe
    $stmt = $bdd->prepare("SELECT * FROM users WHERE email = ? AND passwords = ?");
    $stmt->execute([$email, $password]);
    $user = $stmt->fetch();

    // Vérifie si un utilisateur a été trouvé
    if ($user) {
        // Si les informations d'identification sont correctes, stocke l'utilisateur dans la session
        $_SESSION['user_id'] = $user['id_users'];
        $_SESSION['user_role'] = $user['id_role'];
        
        // Redirige vers la page d'accueil ou une autre page autorisée
        header("Location: index.php");
        exit;
    } else {
        // Si les informations sont incorrectes, message d'erreur
        $error = "Adresse e-mail ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style-connexion.css">
</head>
<body>

    <form action="" method="post" class="form">
        <div>
            <label for="email"></label>
            <input type="email" name="email" id="email" placeholder="Entrez votre adresse mail" required>
        </div>
        <div>
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required>
        </div>
        <div>
            <button type="submit" class="button">Se connecter</button>
        </div>
        <div>
            <a href="creationCompte.php" id="creationCompte">Créer un compte</a>
        </div>
        <!-- Affiche le message d'erreur si les informations sont incorrectes -->
        <?php if (isset($error)) : ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>
    </form>

</body>
</html>
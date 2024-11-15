<?php
include 'header.php'; 
?>

<?php
include("BDD/bdd.php");

if(isset($_POST['send'])){
    if(!empty($_POST['mail'] and !empty($_POST['password']))){
        $mail = htmlspecialchars($_POST['mail']);
        $password = sha1($_POST['password']);
    
        $recupUsers = $bdd->prepare("SELECT * FROM users WHERE email = ? AND mdp = ?");
        $recupUsers ->execute(array($mail, $password));

        if($recupUsers ->rowCount() > 0){
            $user = $recupUsers->fetch();
            $_SESSION['mail'] = $mail;
            $_SESSION['mdp'] = $password;
            $_SESSION['id_users'] = $user['id_users'];
            $_SESSION['prenom'] = $user['prenom'];
            echo "<div class='order-message'>
                Ravi de vous revoir " . $_SESSION['prenom'] . "
            </div>";
        }
        else{
            echo "<div class='order-message' style='background-color: #dc3545;'>
                Votre e-mail ou votre mot de passe est incorect
            </div>";
        }
    }
    else{
        echo "<div class='order-message' style='background-color: #dc3545;'>
                Veuillez remplir tous les champs du formulaire
            </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>REDBOUL - Boisson Énergisante</title>
    <link rel="stylesheet" href="style-accueil.css">
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Boostez votre énergie avec REDBOUL</h1>
            <p>Découvrez la puissance de notre boisson énergisante et dépassez vos limites.</p>
            <a href="produit.php" class="btn">Voir nos produits</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <h2>Pourquoi choisir REDBOUL ?</h2>
        <div class="features-grid">
            <div class="feature-item">
                <h3>Ingrédients naturels</h3>
                <p>Fabriqué avec des ingrédients de qualité pour un maximum d'énergie naturelle.</p>
            </div>
            <div class="feature-item">
                <h3>Performance améliorée</h3>
                <p>Conçu pour améliorer votre performance physique et mentale.</p>
            </div>
            <div class="feature-item">
                <h3>Disponible partout</h3>
                <p>Retrouvez REDBOUL dans vos points de vente habituels et en ligne.</p>
            </div>
        </div>
    </section>

<?php
include 'footer.php';
?>
</body>
</html>
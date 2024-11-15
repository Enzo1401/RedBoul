<?php
session_start(); // Démarre ou reprend la session
session_unset(); // Supprime toutes les variables de session
session_destroy(); // Détruit la session

header("Location: index.php"); // Redirige vers la page d'accueil après déconnexion
exit();
?>
<?php
include("BDD/bdd.php");

$idProduct = $_GET['id'];

$deleteRequest = $bdd ->prepare('DELETE FROM produit WHERE id_produit = :id');

$deleteRequest ->bindParam(':id', $idProduct, PDO::PARAM_INT);

$deleteRequest ->execute()
?>
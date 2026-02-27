<?php
session_start();
include_once("./model/product.model.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// 🔹 TRAITEMENT DE LA MODIFICATION
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $image = $_POST['image'];
    $descriptif = $_POST['descriptif'];
    $prix = $_POST['prix'];

    updateProduct($id, $titre, $image, $descriptif, $prix);

    // Reload pour voir les changements
    header("Location: manageproduct.php");
    exit();
}

// Récupérer tous les produits pour l'affichage
$products = getAllProduct();

include("./templates/manageProducts.phtml");
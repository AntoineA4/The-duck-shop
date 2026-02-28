<?php
session_start();
include_once("./model/product.model.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
    $titre = htmlspecialchars(trim($_POST['titre'] ?? ''), ENT_QUOTES, 'UTF-8');
    $image = filter_var(trim($_POST['image'] ?? ''), FILTER_SANITIZE_URL);
    $descriptif = htmlspecialchars(trim($_POST['descriptif'] ?? ''), ENT_QUOTES, 'UTF-8');
    $prix = filter_var($_POST['prix'] ?? '', FILTER_VALIDATE_FLOAT);

    if ($id === false || $prix === false) {
        die("Données invalides !");
    }

    updateProduct($id, $titre, $image, $descriptif, $prix);

    header("Location: manageproduct.php");
    exit();
}

$products = getAllProduct();

include("./templates/manageProducts.phtml");
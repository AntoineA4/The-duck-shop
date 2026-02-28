<?php
session_start();


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include_once("./model/product.model.php"); 
$data =$_POST;
if(count($data) > 0) {
    $titre = htmlspecialchars(trim($data['titre']), ENT_QUOTES, 'UTF-8');
    $image = filter_var(trim($data['image']), FILTER_SANITIZE_URL);
    $descriptif = htmlspecialchars(trim($data['descriptif']), ENT_QUOTES, 'UTF-8');
    $prix = filter_var($data['prix'], FILTER_VALIDATE_FLOAT);

    if ($prix === false) {
        die("Prix invalide !");
    }

    addProduct($titre, $image, $descriptif, $prix);

    header("Location: index.php");
    exit();
}



include("./templates/addProduct.phtml"); 
?>
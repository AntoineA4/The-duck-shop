<?php
session_start();


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include_once("./model/product.model.php"); 
$data =$_POST;
if(count($data)>0) {
    $titre = $data['titre'];
    $image = $data['image'];
    $descriptif = $data['descriptif'];
    $prix = $data['prix'];

    addProduct($titre, $image, $descriptif, $prix);

    header("Location: index.php");
    exit();
}



include("./templates/addProduct.phtml"); 
?>
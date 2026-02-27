<?php

require_once('./model/connexion.php');

function getAllProduct()
{
    $conn = connexionBDD();
    $stmt = $conn->query("SELECT * FROM produit;");
    $products = $stmt->fetchAll();
    return $products;
}

function getProductById($id)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("SELECT * FROM produit WHERE id=:id;");
    $stmt->execute([
        ':id' => $id
    ]);
    $products = $stmt->fetchAll();
    return $products[0];
}

function addProduct($titre, $image, $descriptif, $prix)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("INSERT INTO produit (titre, image, descriptif, prix) VALUES(:titre, :image, :descriptif, :prix);");
    $stmt->execute([
        ':titre' => $titre,
        ':image' => $image,
        ':descriptif' => $descriptif,
        ':prix'=> $prix
    ]);
}

function updateProduct($id, $titre, $image, $descriptif, $prix)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("UPDATE produit SET titre=:titre, image=:image, descriptif=:descriptif, prix=:prix WHERE id=:id;");
    $stmt->execute([
        ':id' => $id,
        ':titre' => $titre,
        ':image' => $image,
        ':descriptif' => $descriptif,
        ':prix' => $prix
    ]);
}

function deleteProduct($id)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("DELETE FROM produit WHERE id=:id;");
    $stmt->execute([
        ':id' => $id
    ]);
}
<?php
session_start();
include_once("./model/product.model.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? null;

if ($id) {
    deleteProduct($id);
}

header("Location: manageproduct.php");
exit();
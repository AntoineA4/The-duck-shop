<?php
session_start();
include_once("./model/user.model.php");

$message = "";

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        // Connexion
        $login = $_POST['login'];
        $password = $_POST['password'];

        $user = loginUser($login, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: index.php");
            exit();
        } else {
            $message = "Identifiant ou mot de passe incorrect.";
        }

    } elseif (isset($_POST['action']) && $_POST['action'] === 'register') {
        // Création de compte
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (userExists($login)) {
            $message = "Ce login existe déjà.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            addUser($login, $hashed);
            $message = "Compte créé avec succès, vous pouvez vous connecter.";
        }
    }
}

include("./templates/login.phtml");
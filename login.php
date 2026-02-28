<?php
session_start();
include_once("./model/user.model.php");

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST['action'] ?? '';

    
    $login = htmlspecialchars(trim($_POST['login'] ?? ''), ENT_QUOTES, 'UTF-8');
    $password = trim($_POST['password'] ?? '');

    if ($action === 'login') {
        $user = loginUser($login, $password); 
        if ($user) {
            session_regenerate_id(true); 
            unset($user['password']);     
            $_SESSION['user'] = $user;
            header("Location: index.php");
            exit();
        } else {
            $message = "Identifiant ou mot de passe incorrect.";
        }

    } elseif ($action === 'register') {
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
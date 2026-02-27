<?php
require_once('./model/connexion.php');

// Vérifier si un utilisateur existe déjà
function userExists($login) {
    $conn = connexionBDD();
    $stmt = $conn->prepare("SELECT * FROM user WHERE login=:login");
    $stmt->execute([':login' => $login]);
    return $stmt->fetch() ? true : false;
}

// Ajouter un utilisateur (mot de passe déjà hashé)
function addUser($login, $hashedPassword) {
    $conn = connexionBDD();
    $stmt = $conn->prepare("INSERT INTO user (login, password) VALUES(:login, :password)");
    return $stmt->execute([
        ':login' => $login,
        ':password' => $hashedPassword
    ]);
}

// Connexion utilisateur (vérifie le mot de passe hashé)
function loginUser($login, $password) {
    $conn = connexionBDD();
    $stmt = $conn->prepare("SELECT * FROM user WHERE login=:login");
    $stmt->execute([':login' => $login]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}
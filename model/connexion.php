<?php

function connexionBDD()
{
    $dsn = "mysql:host=127.0.0.1;dbname=TP-produits;charset=UTF8";
    $pdo = new PDO($dsn, "antoine", "root", []);
    return $pdo;
}

<?php

require_once(__DIR__."/../../pdo.php");

if(empty($_POST["message"])) {
    die ("Paramètres manquants.");
}

$sql = "INSERT INTO reviews (message, author) VALUES (?,?)";

$insertStatement = $pdo->prepare($sql); 
$insertStatement->execute([
    $_POST["message"],
    $_POST["author"],
]);
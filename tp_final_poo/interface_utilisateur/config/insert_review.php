<?php
require __DIR__.'/pdo.php';
require '../../interface_utilisateur/class/Review.php';
require '../../interface_utilisateur/class/Destination.php';


$manager = new Manager($bdd);

if (isset($_POST['ajouter']))
{
$lieu = new Review(['message' => $_POST['message'],'author' => $_POST['author'],'id_tour_operator' => $_POST['id_tour_operator']]);
var_dump($messages);
var_dump($_POST['author']);
$manager->CreatReview($messages);

}
<?php
require 'pdo.php';
require '../../interface_utilisateur/class/Manager.php';
require '../../interface_utilisateur/class/Review.php';
require 'Autoload.php';
Autoloader::register();
$manager = new Manager($bdd);


if (isset($_POST['ajouter']))
{
$messages = new Review(['message' => $_POST['message'],'author' => $_POST['author'],'TourOperator' => $_POST['id_tour_operator']]);
var_dump($messages);

$manager->CreatReview($messages);

}
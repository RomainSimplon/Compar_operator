<?php
require 'pdo.php';
require '../../interface_utilisateur/class/Manager.php';
require '../../interface_utilisateur/class/Review.php';
require 'Autoload.php';
Autoloader::register();
$manager = new Manager($bdd);
$id = $_POST["id_tour_operator"];

if (isset($_POST['ajouter']))
{
$messages = new Review(['message' => $_POST['message'],'author' => $_POST['author'],'TourOperator' => $_POST['id_tour_operator']]);

$manager->CreatReview($messages);

}
// echo "<script type='text/javascript'>document.location.replace('../admin_destination.php');</script>";

header('Location:../../offre_operator.php?id='.$id.'');

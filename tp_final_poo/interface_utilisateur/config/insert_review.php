<?php
require __DIR__.'/pdo.php';
require '../../interface_utilisateur/class/Review.php';
require '../../interface_utilisateur/class/Destination.php';

$manager = new Manager($bdd);

if (isset($_POST['ajouter']))
{
$lieu = new Destination(['location' => $_POST['location'],'price' => $_POST['price'],'id_tour_operator' => $_POST['id_tour_operator']]);
var_dump($lieu);
var_dump($_POST['price']);
$manager->CreatDestination($lieu);


}
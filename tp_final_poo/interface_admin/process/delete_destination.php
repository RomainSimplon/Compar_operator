<?php
require __DIR__.'/../../interface_utilisateur/config/pdo.php';
require '../../interface_utilisateur/config/Autoload.php';
Autoloader::register();
$manager = new Manager($bdd);
$id = $_GET["id"];
var_dump($id);
$destination = new Destination(['id'=>$id]);
$deleteDestination = $manager->deleteDestination($destination);



echo "<script type='text/javascript'>document.location.replace('../admin_destination.php');</script>";




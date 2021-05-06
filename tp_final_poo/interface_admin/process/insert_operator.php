<?php
require __DIR__.'/../../interface_utilisateur/config/pdo.php';
require '../../interface_utilisateur/config/Autoload.php';
Autoloader::register();




$manager = new Manager($bdd);

if (isset($_POST['ajouter']))
{
$operator = new TourOperator(['name' => $_POST['name'],'grade' => $_POST['grade'],'link' => $_POST['link'],'is_premium' => $_POST['is_premium']]);
$manager->CreatOperator($operator);


}

echo "<script type='text/javascript'>document.location.replace('../admin_operator.php');</script>";

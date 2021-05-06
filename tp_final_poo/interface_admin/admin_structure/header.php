<?php
// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}
include '../interface_utilisateur/config/pdo.php';
include '../interface_utilisateur/config/Autoload.php';
Autoloader::register();
$manager = new Manager($bdd);
$list = $manager->getAllDestination();
$operator= $manager->getAllOperator();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title>Document</title>
</head>
<body>


<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="admin_home.php">INTERFACE ADMIN</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="admin_destination.php">Liste Destinations</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="admin_operator.php">Liste Operators</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../index.php">Home page</a>
    </li>

    
  </ul>
</nav>
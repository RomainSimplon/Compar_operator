<?php
include '../interface_utilisateur/config/pdo.php';
require '../interface_utilisateur/config/Autoload.php';
Autoloader::register();
$manager = new Manager($bdd);
$list = $manager->getAllOperator();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../interface_utilisateur/asset/css/upload.css" rel="stylesheet">
</head>
<body>
    <form action="process/insert_destination.php" method="post" enctype="multipart/form-data">
    <input type="text" name="location" placeholder="Destination">
    <input type="text" name="price" placeholder="prix">
    Tour Operator : <select name="id_tour_operator" id="">
            <?php if (empty($list)) {
                    echo 'aucune Destination est disponible pour le momment';
                } else {
                    foreach ($list as $operateur)
                   echo "<option value='".$operateur->getId()."'>".$operateur->getName()."</option>";
} 
?>
Votre .jpg <input type="file" name="photo" id="fileUpload"><br>
Votre .jpg en noir et blanc<input type="file" name="imagenoiretblanc" id="fileUpload"><br>
            
    </select>
    <input type="submit" name="ajouter"> 
    </form>
</body>

<a href="admin_destination.php"><button type="button"><span>⇠</span></button></a>
</html>
<?php 
require 'interface_utilisateur/config/Autoload.php';
require 'interface_utilisateur/config/pdo.php';
include 'interface_utilisateur/structure/header.php';
Autoloader::register();
$manager = new Manager($bdd);

?>
<h1 id="titledestination">Operateurs disponible</h1>

<div id="destinations">
<h3>⇣ Choisissez votre opérateur ⇣</h3>


<?php

$list = $manager->getAllOperator();

                if (empty($list)) {
                    echo 'aucune Destination est disponible pour le momment';
                } else {
                    foreach ($list as $unelist)
                    echo "<a href='offre_operator.php?id=".$unelist->getId()."'>".($unelist->getName())."</a><br>";
}



?>

</div>


<?php


include 'interface_utilisateur/structure/footer.php';
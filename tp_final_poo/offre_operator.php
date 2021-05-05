<?php
include 'interface_utilisateur/config/pdo.php';
include 'interface_utilisateur/structure/header.php';
include 'interface_utilisateur/config/Autoload.php';
Autoloader::register();
$manager = new Manager($bdd);

$id = $_GET["id"];
$liste_offre = $manager->offreOperator($id);



                if (empty($liste_offre)) {
                    echo 'aucune Destination est disponible pour le momment';
                } else {
                    foreach ($liste_offre as $unelist)
                    echo "<a href='content.php?location=".$unelist->getLocation()."'>".($unelist->getLocation())."</a><br>";
}

?>
<h1>Messages & Author</h1>
    <form action="./interface_utilisateur/config/insert_review.php" method="post">
    <input type="text" name="message" placeholder="Message">
    <input type="text" name="author" placeholder="Auteur">
    <input type="hidden" name="id_tour_operator" placeholder="auteur" value="1">
    <input type="submit" name="ajouter"> 
    </form>
<?php


include 'interface_utilisateur/structure/footer.php';
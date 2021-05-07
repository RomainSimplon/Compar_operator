<?php
include 'interface_utilisateur/config/pdo.php';
include 'interface_utilisateur/structure/header.php';
include 'interface_utilisateur/config/Autoload.php';
Autoloader::register();
$manager = new Manager($bdd);

$id = $_GET["id"];
$liste_offre = $manager->offreOperator($id);


?>


<div id="tour_boxes">
<link rel="stylesheet" href="./interface_utilisateur/asset/css/style.css">

<div id="tour_operator1"> <!-- GAUCHE -->
<?php 
                if (empty($liste_offre)) {
                    echo 'aucune Destination est disponible pour le momment';
                } else {
                    foreach ($liste_offre as $unelist)
                    echo "<a id='linky' href='content.php?location=".$unelist->getLocation()."'>".($unelist->getLocation())."</a><br>";
}
?>
</div>

<div id="tour_operator2"> <!-- DROITE -->
<h1 id="messauthor">Messages & Author</h1>
<form action="./interface_utilisateur/config/insert_review.php" method="post">
    <input type="text" name="message" placeholder="Message">
    <input type="text" name="author" placeholder="Auteur">
    <input type="hidden" name="id_tour_operator" placeholder="auteur" value="<?= $id ?>">
    <input type="submit" name="ajouter"> 
</form>


</div>

<div id="tour_operator3">
<?php
    $messages = $manager->getAllMessages();
    foreach($messages as $msg){
        echo $msg->getAuthor() ;
        echo ' :  ';
        echo $msg->getMessage();
    }
?>
</div>

</div>





<?php


include 'interface_utilisateur/structure/footer.php';

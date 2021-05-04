<?php
 include 'interface_utilisateur/config/pdo.php';
 include 'interface_utilisateur/structure/header.php';
 require 'interface_utilisateur/class/Manager.php';
 require 'interface_utilisateur/class/Destination.php';
 include 'interface_utilisateur/class/TourOperator.php';
 $manager = new Manager($bdd);


$location = $_GET["location"];
// $reponse = $bdd->query('SELECT * FROM destinations WHERE id='.$userId );
// ($donnees = $reponse->fetch());

$operators = $manager->getOperatorByDestination($location);

echo "<h2>" . ucfirst($location) . "</h2>";



foreach ($operators as $operator) {

    if ($operator['operator']->getIsPremium() === 1) {

      echo "<h1>" . ucfirst($operator['operator']->getName()) . "</h1><a href='operateur.php?name=".$operator['operator']->getName()."'>Voir toutes les offres de cet opérateur</a>";
      echo "<p>Prix : " . $operator['destination']->getPrice() . " €</p>";
      
    } else {

      echo "<h3>" . $operator['operator']->getName() . "</h3><a href='operateur.php?name=".htmlspecialchars($operator['operator']->getName())."'>Voir toutes les offres de cet opérateur</a>";
      echo "<p>Prix : " . $operator['destination']->getPrice() . " €</p>";

    };
}
  

include 'interface_utilisateur/structure/footer.php';
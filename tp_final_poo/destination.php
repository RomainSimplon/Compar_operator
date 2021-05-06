<?php 
  require 'interface_utilisateur/config/Autoload.php';
  require 'interface_utilisateur/config/pdo.php';
  include 'interface_utilisateur/structure/header.php';
  Autoloader::register();
  $manager = new Manager($bdd);
  $list = $manager->getAllDestination();



  ?>

  <h1 id="titledestination">DESTINATIONS</h1>
  <?php

  if (empty($list)) {
    echo 'aucune Destination est disponible pour le momment';
  } else {
    foreach ($list as $unelist){

    
?>



<div id="destinations" class="card" tabindex="0">
<h1 class="card__title"><?php 
    echo "<a class='destination' href='content.php?location=".$unelist->getLocation()."'>".($unelist->getLocation())."</a><br>";
?></h1>
<p class="card__description">Lorem ipsum dolor sit amet and this is all the lorem ipsum text I remember</p>
</div>

<?php
  }}
  ?>




<?php
include 'interface_utilisateur/structure/footer.php';
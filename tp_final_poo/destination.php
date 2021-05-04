<?php
  require 'interface_utilisateur/config/pdo.php';
  require 'interface_utilisateur/class/Destination.php';
  require 'interface_utilisateur/class/Manager.php';
  include 'interface_utilisateur/structure/header.php';
  $manager = new Manager($bdd);
?>



<h1 id="desti">DESTINATIONS</h1>

<div id="destinations">
<h3>Choisissez votre destination :</h3>


<?php

$list = $manager->getAllDestination();

                if (empty($list)) {
                    echo 'aucune Destination est disponible pour le momment';
                } else {
                    foreach ($list as $unelist)
                    echo "<a href='content.php?id=".$unelist->getId()."'>".($unelist->getLocation())."</a><br>";
}

                    
                
?>

<!-- <ul>
<li id="navli"><a id="nava" href="">Grenoble</a></li>
<li id="navli"><a id="nava" href="">Costa Rica</a></li>
<li id="navli"><a id="nava" href="./desti/malte.php">Malte</a></li>
<li id="navli"><a id="nava" href="">Ibiza</a></li>
<li id="navli"><a id="nava" href="./desti//zurich.php">Zurich (Premium)</a></li>
</ul> -->
</div>


<?php


include 'interface_utilisateur/structure/footer.php';



<?php
 include 'interface_utilisateur/config/pdo.php';
 include 'interface_utilisateur/structure/header.php';
 
?>


<?php
$userId = $_GET["id"];
$reponse = $bdd->query('SELECT * FROM destinations WHERE id='.$userId );


($donnees = $reponse->fetch());

?>
<h1 id="desti"><? echo $donnees['location'] ?></h1>

<div id="tour_boxes">

<div id="tour_operator1">
<h2>TO</h2>
                Prix <br>
                Photo
</div>

<div id="tour_operator2">
<h2>TO</h2>
                Prix <br>
                Photo


</div>


</div>




<?php

include 'interface_utilisateur/structure/footer.php';

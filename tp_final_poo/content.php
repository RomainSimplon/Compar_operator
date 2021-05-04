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
<h2>Learn:</h2>
                It is a good platform to learn programming.
                It is an educational website. Prepare for
                the Recruitment drive  of product based 
                companies like Microsoft, Amazon, Adobe 
                etc with a free online placement preparation 
                course.
</div>

<div id="tour_operator2">
<h2>Contribute:</h2>
                Any geeks can help other geeks by writing
                articles on the GeeksforGeeks, publishing
                articles follow few steps that are Articles
                that need little modification/improvement
                from reviewers are published first.

</div>


</div>




<?php

include 'interface_utilisateur/structure/footer.php';
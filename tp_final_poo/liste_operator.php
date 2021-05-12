<link rel="stylesheet" href="./interface_utilisateur/asset/css/destination.css">
<?php 
  
  require 'interface_utilisateur/config/Autoload.php';
  require 'interface_utilisateur/config/pdo.php';
  include 'interface_utilisateur/structure/header.php';
  Autoloader::register();
  $manager = new Manager($bdd);
  $list = $manager->getAllOperator();
  function displayBgImage($destination){
    if ($destination->getImage() != '') {
      return '/poo/tp_final_poo/interface_utilisateur/asset/image/'. $destination->getImage();
    }else{
      return 'none';
    }
  }

  function displayBgBlackImage($destinationImage){
    if ($destinationImage->getImageWb() != '') {
      return '/poo/tp_final_poo/interface_utilisateur/asset/image/'. $destinationImage->getImageWb();
    }else{
      return 'none';
    }
  }

  ?>

  <h1 id="titledestination">Operators</h1>
  <?php

  if (empty($list)) {
    echo 'aucune Destination est disponible pour le momment';
  } else {
    foreach ($list as $unelist){
?>

<style>

<?= '.destinations'.$unelist->getId() ?>.bg{
background-image: url('<?= displayBgBlackImage($unelist)?>');
background-position: center;
  background-size: cover;
  outline: none;
  /* background-image:url('interface_utilisateur/asset/image/londre-ConvertImage.jpg'); */
}


 <?= '.destinations'.$unelist->getId() ?>.card:hover, <?= '.destinations'.$unelist->getId() ?>.card:focus{
  background-position: center;
  background-size: cover;
  outline: none;
  display: block;
  -webkit-clip-path: circle(75%);
          clip-path: circle(75%);
  border-radius: 20px;
  -webkit-box-shadow: 0px 3px 9px rgba(0, 0, 0, 0.12), 0px 3px 18px rgba(0, 0, 0, 0.08);
          box-shadow: 0px 3px 9px rgba(0, 0, 0, 0.12), 0px 3px 18px rgba(0, 0, 0, 0.08);
  background-image: url("<?= displayBgImage($unelist)?>");


  }
</style>



  <?php displayBgImage($unelist); ?>
  <div class='<?= 'destinations'.$unelist->getId() ?> bg'>

  
<div id="destinations" class="card destinations<?=$unelist->getId()?>" tabindex="0" >
<h1 class="card__title"><?php 
     echo "<a href='offre_operator.php?id=".$unelist->getId()."'>".($unelist->getName())."</a><br>";
?></h1>
<p class="card__description">Lorem ipsum dolor sit amet and this is all the lorem ipsum text I remember</p>
</div>
</div>
<?php
  }}
  ?>



<div>
    <?php
include 'interface_utilisateur/structure/footer.php';
?>

</div>

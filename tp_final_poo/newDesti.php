<link rel="stylesheet" href="./interface_utilisateur/asset/css/destination.css">
<?php 
  require 'interface_utilisateur/config/Autoload.php';
  require 'interface_utilisateur/config/pdo.php';
  Autoloader::register();
  $manager = new Manager($bdd);
  $list = $manager->getLastDestination();

  function displayBgImage($destination){
    if ($destination->getImage() != '') {
      return '/poo/tp_final_poo/interface_utilisateur/asset/'. $destination->getImage();
    }else{
      return 'none';
    }
  }

  function displayBgBlackImage($destinationImage){
    if ($destinationImage->getImagenoiretblanc() != '') {
      return '/poo/tp_final_poo/interface_utilisateur/asset/'. $destinationImage->getImagenoiretblanc();
    }else{
      return 'none';
    }
  }

  ?>


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
    echo "<a class='destination' href='content.php?location=".$unelist->getLocation()."'>".($unelist->getLocation())."</a><br>";
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


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<link rel="stylesheet" href="interface_utilisateur/asset/css/content.css">
<?php
 include 'interface_utilisateur/config/pdo.php';
 include 'interface_utilisateur/structure/header.php';
 require 'interface_utilisateur/class/Manager.php';
 require 'interface_utilisateur/class/Destination.php';
 include 'interface_utilisateur/class/TourOperator.php';
 $manager = new Manager($bdd);


$location = $_GET["location"];
$operators = $manager->getOperatorByDestination($location);
echo "<div class='info'>";
echo "<div class='card text-center'>";
echo'<div class="card-body">';
echo "<h5 card-title>" . ucfirst($location) . "</h5>";
echo '<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
Tempora, quasi maxime voluptatum deserunt ullam, aliquam ducimus neque architecto sapiente.</p>
<a href="#" class="btn btn-primary">Watch reviews</a>';
echo '</div>';



foreach ($operators as $operator) {

    if ($operator['operator']->getIsPremium() === 1) {
      
      echo "<h1>" . ucfirst($operator['operator']->getName()) . "</h1><a href='offre_operator.php?id=".$operator['operator']->getId()."'>Voir toutes les offres de cet opérateur</a>";
      echo "<p>Prix : " . $operator['destination']->getPrice() . " €</p>";
      echo "</div>";
      echo' </div>';
    } else {

      echo "<h3>" . $operator['operator']->getName() . "</h3><a href='offre_operator.php?id=".htmlspecialchars($operator['operator']->getId())."'>Voir toutes les offres de cet opérateur</a>";
      echo "<p>Prix : " . $operator['destination']->getPrice() . " €</p>";
      echo "</div>";
     echo' </div>';

    };
}
?>






<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="interface_utilisateur/asset/image/italie_carousel1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="interface_utilisateur/asset/image/italie_carousel_2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="interface_utilisateur/asset/image/italie_carouseil3.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>






<?php  

include 'interface_utilisateur/structure/footer.php';
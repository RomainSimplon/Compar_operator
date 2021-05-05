<?php
// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}
include '../interface_utilisateur/config/pdo.php';
include '../interface_utilisateur/config/Autoload.php';
Autoloader::register();
$manager = new Manager($bdd);
$list = $manager->getAllDestination();
$operator= $manager->getAllOperator();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title>Document</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-lg-6">
                <h1>Liste des destination</h1>
                <a href="upload.php">ADD DESTINATION</a>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Location</th>
                        <th>price</th>
                        <th>id_tour_operator</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur tous les articles
                        foreach($list as $unelist){
                        ?>
                            <tr>
                                <td><?echo($unelist->getId())?></td>
                                <td><?echo($unelist->getLocation())?></td>
                                <td><?echo($unelist->getPrice())?></td>
                                <td><?echo($unelist->getId_Tour_Operator())?></td>
                                <td><a href="process/delete_destination.php"><i class="fa fa-ban" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
            <section class="col-lg-6">
                <h1>Liste des operateur</h1>
                <a href="add_operator.php">ADD OPERATOR</a>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>name</th>
                        <th>grade</th>
                        <th>link</th>
                        <th>is_premium</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur tous les articles
                        foreach($operator as $operators){
                        ?>
                            <tr>
                                <td><?echo($operators->getId())?></td>
                                <td><?echo($operators->getName())?></td>
                                <td><?echo($operators->getGrade())?></td>
                                <td><?echo($operators->getLink())?></td>
                                <td><?echo($operators->getIsPremium())?></td>
                                <td><i class="fa fa-ban" aria-hidden="true"></i></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
    
</body>
</html>
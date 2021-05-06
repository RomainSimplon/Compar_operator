<?php
include 'admin_structure/header.php';
?>
    
            <section class="col-lg-12">
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
                                <td><a href="process/delete_destination.php?id=<? echo $unelist->getId()?>"><i class="fa fa-ban" aria-hidden="true"></i></a></td>
                                
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
            
</body>
</html>
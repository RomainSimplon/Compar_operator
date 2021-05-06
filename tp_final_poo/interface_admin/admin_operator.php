<?php
include 'admin_structure/header.php';
?>

<section class="col-lg-12">
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
                                <td><a href="process/delete_operator.php?id=<? echo $operators->getId()?>"><i class="fa fa-ban" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
     
    
</body>
</html>
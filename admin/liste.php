<?php
require_once('security.php');
require_once('../conndb.php');


// $sql = "SELECT * FROM livre l
//         INNER JOIN category c
//         ON l.id_category = c.id_c";

// $resultat = mysqli_query($conn,$sql);


?>


<?php require_once('../partials/header.inc'); ?>

<style>
    .desc{
        height:10px;
        overflow:scroll;
    }
    h1{
        margin-top:6%
    }
</style>
<div class="container">
        <h1 class="bg-light text-center">Administration</h1>
        <a href="ajout.php" class="btn btn-info offset-11 mt-3 mb-3"><i class="fas fa-plus-square mr-2"></i>Ajouter</a>
        <table class="table table-striped bg-white">
            <thead class="text-center bg-dark text-white">       
                <th>Id</th>
                <th>Image</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Description</th>
                <th>Category</th>
                <?php if(isset($_SESSION['auth']) && $_SESSION['auth']['role'] == 1){ ?>
                <th colspan="2">Action</th>
                <?php } ?>
            </thead>
            <tbody >
            <?php
            while($rows = mysqli_fetch_assoc($resultat)){ ?>
                <tr>
                    <td><?=  $rows['id_livre'] ?></td>
                    <td class="desc"><img src="../assets/images/<?= $rows['image']?>" alt="<?= $rows['image']?>" width="100px"/></td>
                    <td><?=  $rows['titre'] ?></td>
                    <td><?=  $rows['auteur'] ?></td>
                    <td ><?=  $rows['description'] ?></td>
                    <td><?=  $rows['nom'] ?></td>
                    <?php if(isset($_SESSION['auth']) && $_SESSION['auth']['role'] == 1){ ?>
                   <td><a href="edit.php?id=<?= $rows['id_livre']; ?>" class="btn btn-outline-secondary">Editer<i class="fas fa-edit ml-2"></i></a></td>
                    <td><a href="delete.php?id=<?= $rows['id_livre']; ?>" class="btn btn-outline-danger" onclick="return confirm('Confirmer la suppression?')">Supprimer<i class="fas fa-trash ml-2"></i></a></td>
                </tr>
            <?php } }?>
            </tbody>
         
        </table>
    </div>

    <?php require_once('../partials/footer.inc'); ?>
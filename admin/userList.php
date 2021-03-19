<?php 
session_start();
require_once('../conndb.php');
require_once('../partials/header.inc');


$userSql = "SELECT * FROM user";

$userResultat = mysqli_query($conn,$userSql);



?>

<style>
    table{
        margin-top: 15%;
    }
</style>

<div class="container col-6">
        <h1 class="bg-light text-center">Administration</h1>
        <!-- <a href="#" class="btn btn-info offset-11 mt-3 mb-3"><i class="fas fa-plus-square mr-2"></i>Ajouter</a> -->
        <table class="table table-striped bg-white ">
            <thead class="text-center bg-dark text-white">       
                <th>Id</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Rôle</th>
                <?php if(isset($_SESSION['auth']) && $_SESSION['auth']['role'] == 1){ ?>
                <th colspan="2">Action</th>
                <?php } ?>
            </thead>
            <tbody class="text-center">
            <?php
            while($rows = mysqli_fetch_assoc($userResultat)){ ?>
                <tr>
                    <td><?=  $rows['id_user'] ?></td>
                    
                    <td><?=  $rows['nom'] ?></td>
                    <td><?=  $rows['prenom'] ?></td>
                    <td ><?=  $rows['role'] ?></td>
                  
                    <?php if(isset($_SESSION['auth']) && $_SESSION['auth']['role'] == 1){ ?>
                        <td>
                        </div>    
                        <a href="editUser.php?id=<?= $rows['id_user']; ?>" class="btn btn-outline-secondary"><i class="fas fa-edit ml-2"></i></a></td>
                        <td><a href="deleteUser.php?id=<?= $rows['id_user']; ?>" class="btn btn-outline-danger" onclick="return confirm('Confirmer la suppression?')"><i class="fas fa-trash ml-2"></i></a> 
                </tr></td>
                       
            <?php } }?>
            </tbody>
         
        </table>
    </div>

    

    <?php require_once('../partials/footer.inc'); ?>
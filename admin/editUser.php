<?php
require_once('security.php');
require_once('../conndb.php'); 

$error = "";


$sql= "SELECT role FROM user ";
$res = mysqli_query($conn,$sql);



if(isset($_GET['id']) && $_GET['id'] <= 1000){
   $id = htmlspecialchars(addslashes($_GET['id']));
   $sql = "SELECT * FROM user
            WHERE id_user = '$id' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $data = mysqli_fetch_assoc($result);

        // var_dump($data);
    }
}

if(isset($_POST['submit'])){
 $id_user = trim(htmlspecialchars(addslashes($_POST['id_user'])));
 $nom = trim(htmlspecialchars(addslashes($_POST['nom'])));
 $prenom = trim(htmlspecialchars(addslashes($_POST['prenom'])));
 $role = trim(htmlspecialchars(addslashes($_POST['role']))); 

        $sql1 = "UPDATE user SET nom = '$nom', prenom = '$prenom', role = '$role'
        WHERE id_user = '$id_user' ";
   

    $resultat = mysqli_query($conn,$sql1);
    header('location:userList.php');
    // var_dump($resultat);

    

    if($resultat){
        header('location:userList.php');
    }
    }

     

 require_once('../partials/header.inc')
?>
<style>
    h1{
        margin-top:8%;
        margin-bottom: 10%;
    }
    .form{
        margin-bottom: 10%;
    }
</style>
<div class="offset-2 col-8">
<h1 class="bg-light text-center">Administration</h1>

<?= $error ?>

    <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" class="bg-white p-4 form">
    <h2 >Formulaire de modification</h2>
    <div class="row">
        <input type="hidden" name="id_user" value="<?=$data['id_user']; ?>" />
      
            <div>
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom svp" value="<?= $data['nom']?>">
            </div>
            <div>
                <label for="prenom">prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom svp" value="<?= $data['prenom']?>">
            </div>
        <div>
        <label for="role">Categorie</label>
            <select class="form-select mb-3" id="role" name="role">
                <option value="<?= $data['role']?>"><?= $data['role']?></option>
                <?php while($rows = mysqli_fetch_assoc($res)){  ?>
            <option value="<?=$rows['role']; ?>"><?=ucfirst($rows['role']) ?><?php if($rows['role'] == 1){ ?> ADMIN <?php }elseif($rows['role'] == 2){?>USER <?php } ?></option>
                <?php } ?>
         </select>
            
        </div>
    </div>

    <div class="mb-">
        <button type="submit" class="btn btn-success col-12" name="submit" >Modifier</button>     
    </div>
    </form>
</div>

<?php require_once('../partials/footer.inc');?>
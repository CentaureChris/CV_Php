<?php
require_once('security.php');
require_once('../conndb.php'); 

$error = "";

$sql= "SELECT id_c, nom FROM category ";
$res = mysqli_query($conn,$sql);



if(isset($_GET['id']) && $_GET['id'] <= 1000){
   $id = htmlspecialchars(addslashes($_GET['id']));
   $sql = "SELECT * FROM livre l
            INNER JOIN category c 
            ON l.id_category = c.id_c
            WHERE l.id_livre = '$id' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $data = mysqli_fetch_assoc($result);

        // var_dump($data);
    }
}

if(isset($_POST['submit'])){
    if(isset($_POST['titre']) && strlen($_POST['titre'])<=50){
 $id_livre = trim(htmlspecialchars(addslashes($_POST['id_livre'])));
 $auteur = trim(htmlspecialchars(addslashes($_POST['auteur'])));
 $titre = trim(htmlspecialchars(addslashes($_POST['titre'])));
 $image = $_FILES['image']['name'];
 $description = trim(htmlspecialchars(addslashes($_POST['description']))); 
 $category = trim(htmlspecialchars(addslashes($_POST['id_category'])));
 $display = $_POST['display'];
 
 
 $destination = "../assets/images/";

 move_uploaded_file($_FILES['image']['tmp_name'],$destination.$image);


    if(empty($image)){
        $sql1 = "UPDATE livre SET auteur = '$auteur', titre = '$titre', id_category = '$category', description = '$description', created = CURRENT_TIMESTAMP, display = '$display'
        WHERE id_livre = '$id_livre' ";
    }else{
        if(file_exists('../assets/images/'.$data['image'])){
            unlink('../assets/images/'.$data['image']);
        }
        $sql1 = "UPDATE livre SET auteur = '$auteur', titre = '$titre', id_category = '$category', description = '$description', image = '$image' ,created = CURRENT_TIMESTAMP, display = '$display'
        WHERE id_livre = '$id_livre'";
    }

    $resultat = mysqli_query($conn,$sql1);
    header('location:liste.php');
    // var_dump($resultat);

    

    if($resultat){
        header('location:liste.php');
    }
    }else{
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        $error = '<div class="alert alert-danger">Erreur d\'insertion</div>';
     }
}
     

 require_once('../partials/header.inc')
?>
<style>
    h1{
        margin-top:7%;
        
    }
</style>
<div class="offset-2 col-8">
<h1 class="bg-light text-center">Administration</h1>
<h2 class="text-white">Formulaire de modification</h2>
<?= $error ?>

    <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" class="bg-white p-3">
    <div class="row">
        <input type="hidden" name="id_livre" value="<?=$data['id_livre']; ?>" />
        <img  class="col-6" src='../assets/images/<?=$data["image"];?>' width="100px" alt="<?=$data['image'];?>" />
        <div class="col-5">
            <div>
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez votre titre svp" value="<?= $data['titre']?>">
            </div>
            <div>
                <label for="auteur">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Entrez votre prénom svp" value="<?= $data['auteur']?>">
            </div>
        <div>
        <label for="category">Categorie</label>
            <select class="form-select mb-3" id="category" name="id_category">
                <option value="<?= $data['id_category']?>"><?= $data['nom']?></option>
                <?php while($rows = mysqli_fetch_assoc($res)){  ?>
            <option value="<?=$rows['id_c']; ?>"><?=ucfirst($rows['nom']) ?></option>
        <?php } ?>
            </select>
            <select name="display" class="form-select mb-3">
            <?php if($data['display']==1){?>
         
             <option value="<?=$data['display'];?>">Afficher</option>
             <option value="0">Masquer</option>
            
            <?php }elseif($data['display'] == 0){?>
        
             <option value="<?=$data['display'];?>">Masquer</option>
             <option value="1">Afficher</option>
             <?php } ?>
         </select>
            
        </div>
    </div>
   
    <div class="row">
        <label for="image" class="col-2">Image: </label>
        <input type="file" class="col-6 form-control mb-3 " id="image" name="image"> 
    </div>
    <label for="description">Description</label>
    <textarea  class="form-control mb-3" id="description" name="description" rows="5" placeholder="Entrez la description svp" ><?= $data['description']?></textarea>
    
   
    <div class="mb-">
        <button type="submit" class="btn btn-success col-12" name="submit" >Modifier</button>     
    </div>
    </form>
</div>

<?php require_once('../partials/footer.inc');?>
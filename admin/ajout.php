<?php
require_once('security.php');
require_once("../conndb.php");

$error = "";
$sql = "SELECT id_c, nom FROM category";
       

$res = mysqli_query($conn,$sql);

if(isset($_POST['submit'])){
    // $id = trim(htmlspecialchars(addslashes($_POST['id_livre'])));
    $auteur = trim(htmlspecialchars(addslashes($_POST['auteur'])));
    $titre = trim(htmlspecialchars(addslashes($_POST['titre'])));
    $image = ($_FILES['image']['name']);
    $description = trim(htmlspecialchars(addslashes($_POST['description']))); 
    $category = trim(htmlspecialchars(addslashes($_POST['id_category'])));
    
    $destination = "../assets/images/";

    move_uploaded_file($_FILES['image']['tmp_name'],$destination.$image);
    
       
    $sql = "INSERT INTO livre (titre, auteur, image, description, created, id_category) 
            VALUES ('$titre', '$auteur','$image','$description',CURRENT_TIMESTAMP,'$category')";
    
    $result = mysqli_query($conn, $sql);

 
    if(mysqli_insert_id($conn) > 0){
        header('location:liste.php');
     }else{
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        $error = '<div class="alert alert-danger">Erreur d\'insertion</div>';
     }
}
?>

<?php
require_once('../partials/header.inc'); 
?>
<style>
 h1{
        margin-top:7%;
    }
</style>
<div class="offset-2 col-8">
<h1 class="bg-light text-center">Administration</h1>
<h2 class="text-white ">Formulaire d'ajout</h2>
<?= $error; ?>
    <form action="ajout.php" method="POST" enctype="multipart/form-data" class="bg-white p-3">
    <div class="row">
    <div class="col-5">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez votre titre svp">
    </div>
    <div class="col-5">
        <label for="auteur">Auteur</label>
        <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Entrez le nom de l'auteur" >
    </div>
  
    </div>

    <div class="row">
    <div class="col">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="col">
        <label for="category">Catégorie</label>
        <select class="form-select" id="category" name="id_category" >
        <option >Choisir</option>
        <?php while($rows = mysqli_fetch_assoc($res)){  ?>
            <option value="<?=$rows['id_c']; ?>"><?=ucfirst($rows['nom']); ?></option>
        <?php } ?>
        </select>
    </div>
    </div>
    <div class="row">
    <div class="col mb-2">
        <label for="desc">Description</label>
        <textarea  class="form-control" id="desc" name="description" rows="5" placeholder="Entrez la description svp"></textarea>
    </div>

    </div>
    <button type="submit" class="btn btn-success col-12" name="submit" >Soumettre</button>
    </form>
</div>


<?php require_once('../partials/footer.inc');?>
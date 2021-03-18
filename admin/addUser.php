<?php 

session_start();

if(isset($_SESSION['auth']) && $_SESSION['auth']['role'] != 1){
    header('location:connexion.php') ;  
}

require_once('../conndb.php');

$error = '';

if(isset($_POST['submit'])){
  $nom = trim(htmlentities(addslashes($_POST['nom'])));
  $prenom = trim(htmlentities(addslashes($_POST['prenom'])));
  $login = trim(htmlentities(addslashes($_POST['login'])));
  $pass = $_POST['pass'];
  
  if(isset($_POST['role'])){
    $role = trim(htmlentities(addslashes($_POST['role'])));
  }else{
      $role = 2;
  }


        $sqlUser= "INSERT INTO user ( nom, prenom, login, pass, role, created) 
                    VALUES ('$nom', '$prenom', '$login', MD5('$pass'), '$role', CURRENT_TIMESTAMP);";

        $result = mysqli_query($conn, $sqlUser);
        
        if(mysqli_insert_id($conn) > 0){
           header('location:connexion.php');
        }else{
            header('location:addUser.php');
        }
       
}

?>


<?php
    require_once('../partials/header.inc');
?>
<style>
    .card{
        margin-top: 10% !important;
    }
</style>
<div class="container">
    <div class="card col-4 offset-4 mt-3 top">
        <div class="card-header text-center">Inscription</div>
        <?=$error; ?>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>"  method="post" ?>
                <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="prenom" name="nom" placeholder="Entrer le nom du nouvel utilisateur" >
                    </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer le prénom du nouvel utilisateur" >
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Entrer le login du nouvel utilisateur" >
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Entrer le mot de passe" >
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="role" name="role" value="1">
                    <label class="form-check-label" for="role" >Administrateur</label>
                </div>
               <div class = text-center>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
               </div>
            </form>
        </div>
    </div>
</div>


<?php
require_once('../partials/footer.inc');


?>